<?php

namespace App\Service;

use App\Entity\Client;

class ScoringService
{
    private const PHONE_OPERATORS = [
        ['prefixes' => ['920', '921', '922', '923', '924', '925',
            '926', '927', '928', '929', '930', '931', '932', '933',
            '937', '938', '939'], 'score' => 10],

        ['prefixes' => ['903', '905', '906', '909', '960', '961',
            '962', '963', '964', '965', '967'], 'score' => 5],

        ['prefixes' => ['910', '911', '912', '913', '914', '915', '916',
            '917', '918', '919', '980', '981', '982', '983', '984', '985',
            '987', '988', '989'], 'score' => 3],

        ['default' => true, 'score' => 1],
    ];

    private const EMAIL_DOMAINS = [
        ['domain' => '@gmail.com', 'score' => 10],
        ['domain' => '@yandex.ru', 'score' => 8],
        ['domain' => '@mail.ru', 'score' => 6],
        ['default' => true, 'score' => 3],
    ];

    private const EDUCATION_SCORES = [
        'higher' => 15,
        'vocational' => 10,
        'secondary' => 5,
    ];

    private const CONSENT_SCORE = 4;

    public function calculateScore(Client $client): int
    {
        return $this->calculatePhoneScore($client->getPhone())
            + $this->calculateEmailScore($client->getEmail())
            + $this->calculateEducationScore($client->getEducation())
            + $this->calculateConsentScore($client->getConsent());
    }

    public function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);

        if (str_starts_with($digits, '8')) {
            return '+7' . substr($digits, 1);
        }

        if (str_starts_with($digits, '7')) {
            return '+' . $digits;
        }

        return '+7' . $digits;
    }

    private function calculatePhoneScore(string $phone): int
    {
        $normalized = $this->normalizePhone($phone);
        $digits = preg_replace('/\D/', '', $normalized);

        if (strlen($digits) > 10) {
            $digits = substr($digits, -10);
        }

        $prefix = substr($digits, 0, 3);

        foreach (self::PHONE_OPERATORS as $operator) {
            if (isset($operator['prefixes']) && in_array($prefix, $operator['prefixes'])) {
                return $operator['score'];
            }
        }

        // Если не нашли по префиксу, возвращаем дефолтный балл
        foreach (self::PHONE_OPERATORS as $operator) {
            if (isset($operator['default']) && $operator['default']) {
                return $operator['score'];
            }
        }

        return 1;
    }

    private function calculateEmailScore(string $email): int
    {
        $domain = strtolower(substr(strrchr($email, "@"), 1));

        foreach (self::EMAIL_DOMAINS as $domainRule) {
            if (isset($domainRule['domain'])) {
                $expected = str_replace('@', '', strtolower($domainRule['domain']));
                if ($domain === $expected) {
                    return $domainRule['score'];
                }
            }
        }

        foreach (self::EMAIL_DOMAINS as $domainRule) {
            if (isset($domainRule['default']) && $domainRule['default']) {
                return $domainRule['score'];
            }
        }

        return 3;
    }


    private function calculateEducationScore(?string $education): int
    {
        return self::EDUCATION_SCORES[$education] ?? 0;
    }

    private function calculateConsentScore(?bool $consent): int
    {
        return $consent ? self::CONSENT_SCORE : 0;
    }

    public function explainScore(Client $client): array
    {
        return [
            'Оператор' => $this->calculatePhoneScore($client->getPhone()),
            'Email' => $this->calculateEmailScore($client->getEmail()),
            'Образование' => $this->calculateEducationScore($client->getEducation()),
            'Согласие' => $this->calculateConsentScore($client->getConsent()),
        ];
    }
}