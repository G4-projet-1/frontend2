<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211024124657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_fiche (id INT AUTO_INCREMENT NOT NULL, id_fiche_id INT NOT NULL, user_id INT NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME DEFAULT NULL, INDEX IDX_C99F04648F89C99D (id_fiche_id), INDEX IDX_C99F0464A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(100) NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_4C13CC78A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modification_fiche (id INT AUTO_INCREMENT NOT NULL, fiche_id INT NOT NULL, user_id INT NOT NULL, date_modif DATETIME NOT NULL, INDEX IDX_8606CA7DDF522508 (fiche_id), INDEX IDX_8606CA7DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, prenom VARCHAR(60) NOT NULL, nom VARCHAR(60) NOT NULL, pseudo VARCHAR(60) NOT NULL, password VARCHAR(100) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_fiche ADD CONSTRAINT FK_C99F04648F89C99D FOREIGN KEY (id_fiche_id) REFERENCES fiche (id)');
        $this->addSql('ALTER TABLE commentaire_fiche ADD CONSTRAINT FK_C99F0464A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC78A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE modification_fiche ADD CONSTRAINT FK_8606CA7DDF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id)');
        $this->addSql('ALTER TABLE modification_fiche ADD CONSTRAINT FK_8606CA7DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_fiche DROP FOREIGN KEY FK_C99F04648F89C99D');
        $this->addSql('ALTER TABLE modification_fiche DROP FOREIGN KEY FK_8606CA7DDF522508');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE commentaire_fiche DROP FOREIGN KEY FK_C99F0464A76ED395');
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC78A76ED395');
        $this->addSql('ALTER TABLE modification_fiche DROP FOREIGN KEY FK_8606CA7DA76ED395');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire_fiche');
        $this->addSql('DROP TABLE fiche');
        $this->addSql('DROP TABLE modification_fiche');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE `user`');
    }
}
