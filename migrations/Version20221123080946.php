<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123080946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, lieu_nom VARCHAR(150) DEFAULT NULL, lieu_capacite INT DEFAULT NULL, lieu_adr_rue VARCHAR(60) DEFAULT NULL, lieu_adr_num VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE manifestation ADD manif_lieu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manifestation ADD CONSTRAINT FK_6F2B3F7F8EAD9BB7 FOREIGN KEY (manif_lieu_id) REFERENCES lieux (id)');
        $this->addSql('CREATE INDEX IDX_6F2B3F7F8EAD9BB7 ON manifestation (manif_lieu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manifestation DROP FOREIGN KEY FK_6F2B3F7F8EAD9BB7');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP INDEX IDX_6F2B3F7F8EAD9BB7 ON manifestation');
        $this->addSql('ALTER TABLE manifestation DROP manif_lieu_id');
    }
}
