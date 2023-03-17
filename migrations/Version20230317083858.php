<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317083858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD opening_time_midday VARCHAR(255) NOT NULL, ADD closing_time_midday VARCHAR(255) NOT NULL, ADD opening_time_evening VARCHAR(255) NOT NULL, ADD closing_time_evening VARCHAR(255) NOT NULL, DROP opening_time_am, DROP closing_time_am, DROP opening_time_pm, DROP closing_time_pm');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD opening_time_am VARCHAR(255) NOT NULL, ADD closing_time_am VARCHAR(255) NOT NULL, ADD opening_time_pm VARCHAR(255) NOT NULL, ADD closing_time_pm VARCHAR(255) NOT NULL, DROP opening_time_midday, DROP closing_time_midday, DROP opening_time_evening, DROP closing_time_evening');
    }
}
