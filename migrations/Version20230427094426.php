<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427094426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evening_slot (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_evening_slot (reservation_id INT NOT NULL, evening_slot_id INT NOT NULL, INDEX IDX_2A18B56CB83297E7 (reservation_id), INDEX IDX_2A18B56CF24289BC (evening_slot_id), PRIMARY KEY(reservation_id, evening_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CF24289BC FOREIGN KEY (evening_slot_id) REFERENCES evening_slot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evening_slots DROP FOREIGN KEY FK_5F20FACD2554000B');
        $this->addSql('ALTER TABLE reservation_evening_slots DROP FOREIGN KEY FK_5F20FACDB83297E7');
        $this->addSql('DROP TABLE reservation_evening_slots');
        $this->addSql('DROP TABLE evening_slots');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_evening_slots (reservation_id INT NOT NULL, evening_slots_id INT NOT NULL, INDEX IDX_5F20FACDB83297E7 (reservation_id), INDEX IDX_5F20FACD2554000B (evening_slots_id), PRIMARY KEY(reservation_id, evening_slots_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evening_slots (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_evening_slots ADD CONSTRAINT FK_5F20FACD2554000B FOREIGN KEY (evening_slots_id) REFERENCES evening_slots (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evening_slots ADD CONSTRAINT FK_5F20FACDB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CB83297E7');
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CF24289BC');
        $this->addSql('DROP TABLE evening_slot');
        $this->addSql('DROP TABLE reservation_evening_slot');
    }
}
