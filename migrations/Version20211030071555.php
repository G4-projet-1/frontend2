<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030071555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC78BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_4C13CC78BCF5E72D ON fiche (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC78BCF5E72D');
        $this->addSql('DROP INDEX IDX_4C13CC78BCF5E72D ON fiche');
        $this->addSql('ALTER TABLE fiche DROP categorie_id');
    }
}
