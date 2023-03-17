<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317123345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gallery');
        $this->addSql('ALTER TABLE schedule CHANGE opening_time_midday opening_time_midday VARCHAR(255) DEFAULT NULL, CHANGE closing_time_midday closing_time_midday VARCHAR(255) DEFAULT NULL, CHANGE opening_time_evening opening_time_evening VARCHAR(255) DEFAULT NULL, CHANGE closing_time_evening closing_time_evening VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE schedule CHANGE opening_time_midday opening_time_midday VARCHAR(255) NOT NULL, CHANGE closing_time_midday closing_time_midday VARCHAR(255) NOT NULL, CHANGE opening_time_evening opening_time_evening VARCHAR(255) NOT NULL, CHANGE closing_time_evening closing_time_evening VARCHAR(255) NOT NULL');
    }
}
