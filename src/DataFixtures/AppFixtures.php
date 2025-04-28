<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Service\ScoringService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\ru_RU\PhoneNumber;

class AppFixtures extends Fixture
{
    private ScoringService $scoringService;

    public function __construct(ScoringService $scoringService)
    {
        $this->scoringService = $scoringService;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('ru_RU');
        $faker->addProvider(new PhoneNumber($faker));

        for ($i = 0; $i < 10; $i++) {
            $client = new Client();
            $client->setFirstName($faker->firstName());
            $client->setLastName($faker->lastName());
            $client->setEmail($faker->email());
            $client->setPhone($this->normalizePhone($faker->phoneNumber()));
            $client->setEducation($faker->randomElement(['higher', 'vocational', 'secondary']));
            $client->setConsent($faker->boolean());

            $score = $this->scoringService->calculateScore($client);
            $client->setScore($score);

            $manager->persist($client);
        }

        $manager->flush();
    }

    private function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);

        if (str_starts_with($digits, '8')) {
            return '+7' . substr($digits, 1);
        }

        if (str_starts_with($digits, '7')) {
            return '+' . $digits;
        }

        return '+7' . substr($digits, 0, 10);
    }
}