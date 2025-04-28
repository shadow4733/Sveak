<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Service\ScoringService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ClientController extends AbstractController
{
    #[Route('/register', name: 'client_register')]
    public function register(
        Request $request,
        ManagerRegistry $doctrine,
        ScoringService $scoringService
    ): Response {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $score = $scoringService->calculateScore($client);
            $client->setScore($score);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            $this->addFlash('success', 'Клиент зарегистрирован! Скоринг: '.$score);
            return $this->redirectToRoute('client_register');
        }

        return $this->render('client/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/clients', name: 'client_list')]
    public function list(ManagerRegistry $doctrine, Request $request): Response
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = 10;
        $repository = $doctrine->getRepository(Client::class);
        $total = $repository->count([]);
        $clients = $repository->findBy([], null, $limit, ($page - 1) * $limit);

        return $this->render('client/clients.html.twig', [
            'clients' => $clients,
            'current_page' => $page,
            'total_pages' => ceil($total / $limit),
        ]);
    }

    #[Route('/client/{id}/edit', name: 'client_edit')]
    public function edit(
        int $id,
        Request $request,
        ManagerRegistry $doctrine,
        ScoringService $scoringService
    ): Response {
        $entityManager = $doctrine->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException('Клиент не найден');
        }

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $score = $scoringService->calculateScore($client);
            $client->setScore($score);

            $entityManager->flush();
            $this->addFlash('success', 'Данные клиента обновлены. Новый скоринг: '.$score);

            return $this->redirectToRoute('client_list');
        }

        return $this->render('client/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/client/{id}', name: 'client_show')]
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }
}
