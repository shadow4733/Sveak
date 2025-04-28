<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250424115631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление колонки score в таблицу client';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE client ADD score INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE client DROP score');
    }
}
