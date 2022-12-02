<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201140453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, lieu_nom VARCHAR(150) DEFAULT NULL, lieu_capacite INT DEFAULT NULL, lieu_adr_rue VARCHAR(60) DEFAULT NULL, lieu_adr_num VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manifestation (id INT AUTO_INCREMENT NOT NULL, manif_lieu_id INT DEFAULT NULL, manif_titre VARCHAR(100) DEFAULT NULL, manif_desc VARCHAR(255) DEFAULT NULL, manif_casting VARCHAR(255) DEFAULT NULL, manif_genre VARCHAR(50) DEFAULT NULL, manif_affiche VARCHAR(50) DEFAULT NULL, manif_horaire VARCHAR(5) DEFAULT NULL, manif_date VARCHAR(10) DEFAULT NULL, manif_prix INT DEFAULT NULL, INDEX IDX_6F2B3F7F8EAD9BB7 (manif_lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE manifestation ADD CONSTRAINT FK_6F2B3F7F8EAD9BB7 FOREIGN KEY (manif_lieu_id) REFERENCES lieux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manifestation DROP FOREIGN KEY FK_6F2B3F7F8EAD9BB7');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP TABLE manifestation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
