<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427121932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_day_slot (reservation_id INT NOT NULL, day_slot_id INT NOT NULL, INDEX IDX_9AD32F05B83297E7 (reservation_id), INDEX IDX_9AD32F05A120611E (day_slot_id), PRIMARY KEY(reservation_id, day_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_evening_slot (reservation_id INT NOT NULL, evening_slot_id INT NOT NULL, INDEX IDX_2A18B56CB83297E7 (reservation_id), INDEX IDX_2A18B56CF24289BC (evening_slot_id), PRIMARY KEY(reservation_id, evening_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05A120611E FOREIGN KEY (day_slot_id) REFERENCES day_slot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CF24289BC FOREIGN KEY (evening_slot_id) REFERENCES evening_slot (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05B83297E7');
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05A120611E');
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CB83297E7');
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CF24289BC');
        $this->addSql('DROP TABLE reservation_day_slot');
        $this->addSql('DROP TABLE reservation_evening_slot');
    }
}
