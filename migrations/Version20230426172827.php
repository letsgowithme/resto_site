<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426172827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_day_slots DROP FOREIGN KEY FK_6BFEE8AB1DDFA027');
        $this->addSql('ALTER TABLE reservation_day_slots DROP FOREIGN KEY FK_6BFEE8ABB83297E7');
        $this->addSql('DROP TABLE reservation_day_slots');
        $this->addSql('ALTER TABLE reservation ADD day_time INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_day_slots (reservation_id INT NOT NULL, day_slots_id INT NOT NULL, INDEX IDX_6BFEE8ABB83297E7 (reservation_id), INDEX IDX_6BFEE8AB1DDFA027 (day_slots_id), PRIMARY KEY(reservation_id, day_slots_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_day_slots ADD CONSTRAINT FK_6BFEE8AB1DDFA027 FOREIGN KEY (day_slots_id) REFERENCES day_slots (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_day_slots ADD CONSTRAINT FK_6BFEE8ABB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP day_time');
    }
}
