<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427113801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day_slot ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE day_slot ADD CONSTRAINT FK_766CD11B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_766CD11B83297E7 ON day_slot (reservation_id)');
        $this->addSql('ALTER TABLE evening_slot ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evening_slot ADD CONSTRAINT FK_4809C46EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4809C46EB83297E7 ON evening_slot (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evening_slot DROP FOREIGN KEY FK_4809C46EB83297E7');
        $this->addSql('DROP INDEX IDX_4809C46EB83297E7 ON evening_slot');
        $this->addSql('ALTER TABLE evening_slot DROP reservation_id');
        $this->addSql('ALTER TABLE day_slot DROP FOREIGN KEY FK_766CD11B83297E7');
        $this->addSql('DROP INDEX IDX_766CD11B83297E7 ON day_slot');
        $this->addSql('ALTER TABLE day_slot DROP reservation_id');
    }
}
