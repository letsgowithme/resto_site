<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501083514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CB83297E7');
        $this->addSql('ALTER TABLE reservation_evening_slot DROP FOREIGN KEY FK_2A18B56CF24289BC');
        $this->addSql('DROP TABLE reservation_evening_slot');
        $this->addSql('ALTER TABLE evening_slot DROP FOREIGN KEY FK_4809C46EB83297E7');
        $this->addSql('DROP INDEX IDX_4809C46EB83297E7 ON evening_slot');
        $this->addSql('ALTER TABLE evening_slot DROP reservation_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559C24126');
        $this->addSql('DROP INDEX IDX_42C849559C24126 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE day_id evening_slot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F24289BC FOREIGN KEY (evening_slot_id) REFERENCES evening_slot (id)');
        $this->addSql('CREATE INDEX IDX_42C84955F24289BC ON reservation (evening_slot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_evening_slot (reservation_id INT NOT NULL, evening_slot_id INT NOT NULL, INDEX IDX_2A18B56CB83297E7 (reservation_id), INDEX IDX_2A18B56CF24289BC (evening_slot_id), PRIMARY KEY(reservation_id, evening_slot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation_evening_slot ADD CONSTRAINT FK_2A18B56CF24289BC FOREIGN KEY (evening_slot_id) REFERENCES evening_slot (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evening_slot ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evening_slot ADD CONSTRAINT FK_4809C46EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4809C46EB83297E7 ON evening_slot (reservation_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F24289BC');
        $this->addSql('DROP INDEX IDX_42C84955F24289BC ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE evening_slot_id day_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559C24126 FOREIGN KEY (day_id) REFERENCES day_slot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C849559C24126 ON reservation (day_id)');
    }
}
