<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426163527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_table (reservation_id INT NOT NULL, table_id INT NOT NULL, INDEX IDX_B5565FE1B83297E7 (reservation_id), INDEX IDX_B5565FE1ECFF285C (table_id), PRIMARY KEY(reservation_id, table_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_table ADD CONSTRAINT FK_B5565FE1B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reservation_table ADD CONSTRAINT FK_B5565FE1ECFF285C FOREIGN KEY (table_id) REFERENCES `table` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495585405FD2');
        $this->addSql('DROP INDEX UNIQ_42C8495585405FD2 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP tables_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_table DROP FOREIGN KEY FK_B5565FE1B83297E7');
        $this->addSql('ALTER TABLE reservation_table DROP FOREIGN KEY FK_B5565FE1ECFF285C');
        $this->addSql('DROP TABLE reservation_table');
        $this->addSql('ALTER TABLE reservation ADD tables_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495585405FD2 FOREIGN KEY (tables_id) REFERENCES `table` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C8495585405FD2 ON reservation (tables_id)');
    }
}
