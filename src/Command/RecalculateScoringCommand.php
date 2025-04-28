<?php

namespace App\Command;

use App\Repository\ClientRepository;
use App\Service\ScoringService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:recalculate-scoring',
    description: 'Рассчитывает скоринг клиентов (одного или всех)',
)]
class RecalculateScoringCommand extends Command
{
    private ScoringService $scoringService;
    private ClientRepository $clientRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ScoringService $scoringService,
        ClientRepository $clientRepository,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct();
        $this->scoringService = $scoringService;
        $this->clientRepository = $clientRepository;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument(
                'id',
                InputArgument::OPTIONAL,
                'ID клиента, для которого нужно рассчитать скоринг. Если не указан — рассчитывает для всех.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = $input->getArgument('id');

        if ($id) {
            $client = $this->clientRepository->find($id);
            if (!$client) {
                $output->writeln("<error>Клиент с ID $id не найден.</error>");
                return Command::FAILURE;
            }

            $scoring = $this->scoringService->calculateScore($client);
            $this->entityManager->flush();

            $output->writeln("<info>Скоринг для клиента #$id пересчитан: $scoring</info>");
            $this->outputDetails($output, $client);
        } else {
            $clients = $this->clientRepository->findAll();

            foreach ($clients as $client) {
                $scoring = $this->scoringService->calculateScore($client);
                $output->writeln("Клиент #{$client->getId()} скоринг: $scoring");
            }

            $this->entityManager->flush();
            $output->writeln("<info>Скоринг для всех клиентов успешно пересчитан.</info>");
        }

        return Command::SUCCESS;
    }

    private function outputDetails(OutputInterface $output, $client): void
    {
        $details = $this->scoringService->explainScore($client);
        $output->writeln("Детализация:");
        foreach ($details as $rule => $score) {
            $output->writeln(" - $rule: $score баллов");
        }
    }
}
