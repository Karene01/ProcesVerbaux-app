<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524144402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__QUESTION_A_DISCUTER AS SELECT id_question_a_discuter, id_question, question_a_discuter FROM QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE QUESTION_A_DISCUTER (id_question_a_discuter INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER NOT NULL, question_a_discuter VARCHAR(255) NOT NULL, CONSTRAINT FK_827D1236E62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO QUESTION_A_DISCUTER (id_question_a_discuter, id_question, question_a_discuter) SELECT id_question_a_discuter, id_question, question_a_discuter FROM __temp__QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_827D1236E62CA5DB ON QUESTION_A_DISCUTER (id_question)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__QUESTION_A_DISCUTER AS SELECT id_question_a_discuter, id_question, question_a_discuter FROM QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE QUESTION_A_DISCUTER (id_question_a_discuter INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER DEFAULT NULL, question_a_discuter VARCHAR(255) NOT NULL, CONSTRAINT FK_827D1236E62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO QUESTION_A_DISCUTER (id_question_a_discuter, id_question, question_a_discuter) SELECT id_question_a_discuter, id_question, question_a_discuter FROM __temp__QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__QUESTION_A_DISCUTER
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_827D1236E62CA5DB ON QUESTION_A_DISCUTER (id_question)
        SQL);
    }
}
