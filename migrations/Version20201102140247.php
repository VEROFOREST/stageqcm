<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201102140247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_eleve ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse_eleve ADD CONSTRAINT FK_3487E94A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3487E94A76ED395 ON reponse_eleve (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_eleve DROP FOREIGN KEY FK_3487E94A76ED395');
        $this->addSql('DROP INDEX IDX_3487E94A76ED395 ON reponse_eleve');
        $this->addSql('ALTER TABLE reponse_eleve DROP user_id');
    }
}
