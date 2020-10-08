<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008073320 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_prof ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse_prof ADD CONSTRAINT FK_67D139F81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_67D139F81E27F6BF ON reponse_prof (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_prof DROP FOREIGN KEY FK_67D139F81E27F6BF');
        $this->addSql('DROP INDEX IDX_67D139F81E27F6BF ON reponse_prof');
        $this->addSql('ALTER TABLE reponse_prof DROP question_id');
    }
}
