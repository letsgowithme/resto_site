<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426184050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05B83297E7');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_day_slot DROP FOREIGN KEY FK_9AD32F05B83297E7');
        $this->addSql('ALTER TABLE reservation_day_slot ADD CONSTRAINT FK_9AD32F05B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
