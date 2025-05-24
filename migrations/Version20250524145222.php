<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524145222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__QUESTION_A_VOTER AS SELECT id_question_a_voter, id_question, question_a_voter FROM QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE QUESTION_A_VOTER (id_question_a_voter INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER NOT NULL, question_a_voter VARCHAR(255) NOT NULL, CONSTRAINT FK_290F12EAE62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO QUESTION_A_VOTER (id_question_a_voter, id_question, question_a_voter) SELECT id_question_a_voter, id_question, question_a_voter FROM __temp__QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_290F12EAE62CA5DB ON QUESTION_A_VOTER (id_question)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__QUESTION_A_VOTER AS SELECT id_question_a_voter, id_question, question_a_voter FROM QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE QUESTION_A_VOTER (id_question_a_voter INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER DEFAULT NULL, question_a_voter VARCHAR(255) NOT NULL, CONSTRAINT FK_290F12EAE62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO QUESTION_A_VOTER (id_question_a_voter, id_question, question_a_voter) SELECT id_question_a_voter, id_question, question_a_voter FROM __temp__QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__QUESTION_A_VOTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_290F12EAE62CA5DB ON QUESTION_A_VOTER (id_question)
        SQL);
    }
}
