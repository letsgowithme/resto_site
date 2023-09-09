<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230909081258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B1E7706E');
        $this->addSql('CREATE TABLE dinner_hours (id INT AUTO_INCREMENT NOT NULL, hour VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_hours (id INT AUTO_INCREMENT NOT NULL, hour VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP TABLE day_slot');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP INDEX IDX_42C84955B1E7706E ON reservation');
        $this->addSql('ALTER TABLE reservation ADD dinner_hours_id INT DEFAULT NULL, DROP lunch_time, DROP dinner_time, CHANGE restaurant_id lunch_hours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F14196D7 FOREIGN KEY (lunch_hours_id) REFERENCES lunch_hours (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955303F6001 FOREIGN KEY (dinner_hours_id) REFERENCES dinner_hours (id)');
        $this->addSql('CREATE INDEX IDX_42C84955F14196D7 ON reservation (lunch_hours_id)');
        $this->addSql('CREATE INDEX IDX_42C84955303F6001 ON reservation (dinner_hours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955303F6001');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F14196D7');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nb_total_places INT NOT NULL, nb_available_places INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE places (id INT AUTO_INCREMENT NOT NULL, nb_total_places INT NOT NULL, nb_available_places INT NOT NULL, date DATE NOT NULL, nb_busy_places INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE day_slot (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nb_places INT NOT NULL, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, conditions LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE dinner_hours');
        $this->addSql('DROP TABLE lunch_hours');
        $this->addSql('DROP INDEX IDX_42C84955F14196D7 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955303F6001 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD restaurant_id INT DEFAULT NULL, ADD lunch_time VARCHAR(255) DEFAULT NULL, ADD dinner_time VARCHAR(255) DEFAULT NULL, DROP lunch_hours_id, DROP dinner_hours_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C84955B1E7706E ON reservation (restaurant_id)');
    }
}
