<?php

namespace App\Tests\Service;

use App\Entity\Client;
use App\Service\ScoringService;
use PHPUnit\Framework\TestCase;

class ScoringServiceTest extends TestCase
{
    private ScoringService $scoringService;

    protected function setUp(): void
    {
        $this->scoringService = new ScoringService();
    }

    public function testCalculateScoreWithValidData(): void
    {
        $client = new Client();
        $client->setPhone('+79201234567');
        $client->setEmail('test@gmail.com');
        $client->setEducation('higher');
        $client->setConsent(true);

        $expectedScore = 10 + 10 + 15 + 4;

        $this->assertEquals($expectedScore, $this->scoringService->calculateScore($client));
    }

    public function testCalculateScoreWithOtherPhoneOperator(): void
    {
        $client = new Client();
        $client->setPhone('+79091234567');
        $client->setEmail('test@yandex.ru');
        $client->setEducation('vocational');
        $client->setConsent(false);

        $expectedScore = 5 + 8 + 10 + 0;

        $this->assertEquals($expectedScore, $this->scoringService->calculateScore($client));
    }

    public function testCalculateScoreWithEmptyConsent(): void
    {
        $client = new Client();
        $client->setPhone('+79891234567');
        $client->setEmail('test@mail.ru');
        $client->setEducation('secondary');
        $client->setConsent(false);

        $expectedScore = 3 + 6 + 5 + 0;

        $this->assertEquals($expectedScore, $this->scoringService->calculateScore($client));
    }

    public function testExplainScore(): void
    {
        $client = new Client();
        $client->setPhone('+79201234567');
        $client->setEmail('test@gmail.com');
        $client->setEducation('higher');
        $client->setConsent(true);

        $expectedDetails = [
            'Оператор' => 10,
            'Email' => 10,
            'Образование' => 15,
            'Согласие' => 4,
        ];

        $this->assertEquals($expectedDetails, $this->scoringService->explainScore($client));
    }

}