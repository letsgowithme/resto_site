<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704080528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE time_slot (id INT AUTO_INCREMENT NOT NULL, lunch_time_start VARCHAR(255) DEFAULT NULL, lunch_slot VARCHAR(255) DEFAULT NULL, lunch_time_end VARCHAR(255) DEFAULT NULL, dinner_time_start VARCHAR(255) DEFAULT NULL, dinner_slot VARCHAR(255) DEFAULT NULL, dinner_time_end VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD time_slots_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BA14C497 FOREIGN KEY (time_slots_id) REFERENCES time_slot (id)');
        $this->addSql('CREATE INDEX IDX_42C84955BA14C497 ON reservation (time_slots_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BA14C497');
        $this->addSql('DROP TABLE time_slot');
        $this->addSql('DROP INDEX IDX_42C84955BA14C497 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP time_slots_id');
    }
}
