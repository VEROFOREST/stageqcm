<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002075408 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere_user (matiere_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FE415017F46CD258 (matiere_id), INDEX IDX_FE415017A76ED395 (user_id), PRIMARY KEY(matiere_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_user (session_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_4BE2D663613FECDF (session_id), INDEX IDX_4BE2D663A76ED395 (user_id), PRIMARY KEY(session_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere_user ADD CONSTRAINT FK_FE415017F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_user ADD CONSTRAINT FK_FE415017A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_user ADD CONSTRAINT FK_4BE2D663613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_user ADD CONSTRAINT FK_4BE2D663A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note ADD reponse_eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1455E048C5 FOREIGN KEY (reponse_eleve_id) REFERENCES reponse_eleve (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA1455E048C5 ON note (reponse_eleve_id)');
        $this->addSql('ALTER TABLE question ADD questionnaire_id INT DEFAULT NULL, ADD type_reponse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ECE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaire (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ED21B6DA7 FOREIGN KEY (type_reponse_id) REFERENCES type_reponse (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494ECE07E8FF ON question (questionnaire_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494ED21B6DA7 ON question (type_reponse_id)');
        $this->addSql('ALTER TABLE questionnaire ADD matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE questionnaire ADD CONSTRAINT FK_7A64DAFF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_7A64DAFF46CD258 ON questionnaire (matiere_id)');
        $this->addSql('ALTER TABLE reponse_eleve ADD session_id INT DEFAULT NULL, ADD reponse_prof_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse_eleve ADD CONSTRAINT FK_3487E94613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE reponse_eleve ADD CONSTRAINT FK_3487E9422C688C7 FOREIGN KEY (reponse_prof_id) REFERENCES reponse_prof (id)');
        $this->addSql('CREATE INDEX IDX_3487E94613FECDF ON reponse_eleve (session_id)');
        $this->addSql('CREATE INDEX IDX_3487E9422C688C7 ON reponse_eleve (reponse_prof_id)');
        $this->addSql('ALTER TABLE reponse_prof ADD question_id INT DEFAULT NULL, DROP reponse_choix, DROP libelle_reponse');
        $this->addSql('ALTER TABLE reponse_prof ADD CONSTRAINT FK_67D139F81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_67D139F81E27F6BF ON reponse_prof (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE matiere_user');
        $this->addSql('DROP TABLE session_user');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1455E048C5');
        $this->addSql('DROP INDEX UNIQ_CFBDFA1455E048C5 ON note');
        $this->addSql('ALTER TABLE note DROP reponse_eleve_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ECE07E8FF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ED21B6DA7');
        $this->addSql('DROP INDEX IDX_B6F7494ECE07E8FF ON question');
        $this->addSql('DROP INDEX IDX_B6F7494ED21B6DA7 ON question');
        $this->addSql('ALTER TABLE question DROP questionnaire_id, DROP type_reponse_id');
        $this->addSql('ALTER TABLE questionnaire DROP FOREIGN KEY FK_7A64DAFF46CD258');
        $this->addSql('DROP INDEX IDX_7A64DAFF46CD258 ON questionnaire');
        $this->addSql('ALTER TABLE questionnaire DROP matiere_id');
        $this->addSql('ALTER TABLE reponse_eleve DROP FOREIGN KEY FK_3487E94613FECDF');
        $this->addSql('ALTER TABLE reponse_eleve DROP FOREIGN KEY FK_3487E9422C688C7');
        $this->addSql('DROP INDEX IDX_3487E94613FECDF ON reponse_eleve');
        $this->addSql('DROP INDEX IDX_3487E9422C688C7 ON reponse_eleve');
        $this->addSql('ALTER TABLE reponse_eleve DROP session_id, DROP reponse_prof_id');
        $this->addSql('ALTER TABLE reponse_prof DROP FOREIGN KEY FK_67D139F81E27F6BF');
        $this->addSql('DROP INDEX IDX_67D139F81E27F6BF ON reponse_prof');
        $this->addSql('ALTER TABLE reponse_prof ADD reponse_choix LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD libelle_reponse LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP question_id');
    }
}
