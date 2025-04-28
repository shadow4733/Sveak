<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250424105342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание клиентской таблицы';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE client (
            id INT AUTO_INCREMENT NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            phone VARCHAR(12) NOT NULL,
            email VARCHAR(255) NOT NULL,
            education VARCHAR(255) NOT NULL,
            consent TINYINT(1) NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE client');
    }
}