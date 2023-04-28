<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426182116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE day_slot (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) NOT NULL, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_day_slot (reservation_id INT NOT NULL, day_slot_id INT NOT NULL, INDEX IDX_9AD32F05B83297E7 (reservation_id), INDEX IDX_9AD32F05A120611E (day_slot_id), PRIMARY KEY(reservation_id, day_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05A120611E FOREIGN KEY (day_slot_id) REFERENCES day_slot (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE day_slots');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE day_slots (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05B83297E7');
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05A120611E');
        $this->addSql('DROP TABLE day_slot');
        $this->addSql('DROP TABLE reservation_day_slot');
    }
}
