<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501082041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05A120611E');
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05B83297E7');
        $this->addSql('DROP TABLE reservation_day_slot');
        $this->addSql('ALTER TABLE day_slot DROP FOREIGN KEY FK_766CD11B83297E7');
        $this->addSql('DROP INDEX IDX_766CD11B83297E7 ON day_slot');
        $this->addSql('ALTER TABLE day_slot DROP reservation_id');
        $this->addSql('ALTER TABLE reservation ADD day_id INT DEFAULT NULL, ADD dayslot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559C24126 FOREIGN KEY (day_id) REFERENCES day_slot (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557081DC2 FOREIGN KEY (dayslot_id) REFERENCES day_slot (id)');
        $this->addSql('CREATE INDEX IDX_42C849559C24126 ON reservation (day_id)');
        $this->addSql('CREATE INDEX IDX_42C849557081DC2 ON reservation (dayslot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_day_slot (reservation_id INT NOT NULL, day_slot_id INT NOT NULL, INDEX IDX_9AD32F05B83297E7 (reservation_id), INDEX IDX_9AD32F05A120611E (day_slot_id), PRIMARY KEY(reservation_id, day_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05A120611E FOREIGN KEY (day_slot_id) REFERENCES day_slot (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559C24126');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557081DC2');
        $this->addSql('DROP INDEX IDX_42C849559C24126 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849557081DC2 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP day_id, DROP dayslot_id');
        $this->addSql('ALTER TABLE day_slot ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE day_slot ADD CONSTRAINT FK_766CD11B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_766CD11B83297E7 ON day_slot (reservation_id)');
    }
}
