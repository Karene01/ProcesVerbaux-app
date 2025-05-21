<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250521204231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__ASSEMBLEE_GENERALE AS SELECT id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte FROM ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ASSEMBLEE_GENERALE (id_assemblee_generale INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_copropriete INTEGER DEFAULT NULL, date_assemblee_generale DATETIME NOT NULL, heure_assemblee_generale TIME NOT NULL, ouverte BOOLEAN NOT NULL, CONSTRAINT FK_853401B3FEE9CE2 FOREIGN KEY (id_copropriete) REFERENCES COPROPRIETE (id_copropriete) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO ASSEMBLEE_GENERALE (id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte) SELECT id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte FROM __temp__ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_853401B3FEE9CE2 ON ASSEMBLEE_GENERALE (id_copropriete)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__PARTICIPATION AS SELECT id_participation, id_participant, id_mandataire, id_assemblee_generale, present FROM PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE PARTICIPATION (id_participation INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_participant INTEGER DEFAULT NULL, id_mandataire INTEGER DEFAULT NULL, id_assemblee_generale INTEGER DEFAULT NULL, present BOOLEAN DEFAULT 0 NOT NULL, CONSTRAINT FK_8D19E0AA27D43EE1 FOREIGN KEY (id_participant) REFERENCES COPROPRIETAIRE (id_coproprietaire) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D19E0AAAB20AB8C FOREIGN KEY (id_mandataire) REFERENCES COPROPRIETAIRE (id_coproprietaire) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D19E0AA83D084AB FOREIGN KEY (id_assemblee_generale) REFERENCES ASSEMBLEE_GENERALE (id_assemblee_generale) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO PARTICIPATION (id_participation, id_participant, id_mandataire, id_assemblee_generale, present) SELECT id_participation, id_participant, id_mandataire, id_assemblee_generale, present FROM __temp__PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AA83D084AB ON PARTICIPATION (id_assemblee_generale)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AACF8DA6E6 ON PARTICIPATION (id_participant)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AAB82E5C63 ON PARTICIPATION (id_mandataire)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__VOTE AS SELECT id_vote, id_question, id_participation, valeur_vote FROM VOTE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE VOTE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE VOTE (id_vote INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER DEFAULT NULL, id_participation INTEGER DEFAULT NULL, id_assemblee_generale INTEGER DEFAULT NULL, valeur_vote VARCHAR(20) NOT NULL, CONSTRAINT FK_6C8568D0E62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6C8568D0157D332A FOREIGN KEY (id_participation) REFERENCES PARTICIPATION (id_participation) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6C8568D083D084AB FOREIGN KEY (id_assemblee_generale) REFERENCES ASSEMBLEE_GENERALE (id_assemblee_generale) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO VOTE (id_vote, id_question, id_participation, valeur_vote) SELECT id_vote, id_question, id_participation, valeur_vote FROM __temp__VOTE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__VOTE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C8568D0157D332A ON VOTE (id_participation)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C8568D0E62CA5DB ON VOTE (id_question)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C8568D083D084AB ON VOTE (id_assemblee_generale)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__ASSEMBLEE_GENERALE AS SELECT id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte FROM ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ASSEMBLEE_GENERALE (id_assemblee_generale INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_copropriete INTEGER DEFAULT NULL, date_assemblee_generale DATETIME NOT NULL, heure_assemblee_generale TIME NOT NULL, ouverte BOOLEAN DEFAULT 0 NOT NULL, CONSTRAINT FK_853401B3FEE9CE2 FOREIGN KEY (id_copropriete) REFERENCES COPROPRIETE (id_copropriete) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO ASSEMBLEE_GENERALE (id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte) SELECT id_assemblee_generale, id_copropriete, date_assemblee_generale, heure_assemblee_generale, ouverte FROM __temp__ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__ASSEMBLEE_GENERALE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_853401B3FEE9CE2 ON ASSEMBLEE_GENERALE (id_copropriete)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__PARTICIPATION AS SELECT id_participation, id_participant, id_mandataire, id_assemblee_generale, present FROM PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE PARTICIPATION (id_participation INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_participant INTEGER DEFAULT NULL, id_mandataire INTEGER DEFAULT NULL, id_assemblee_generale INTEGER DEFAULT NULL, present BOOLEAN DEFAULT FALSE, CONSTRAINT FK_8D19E0AACF8DA6E6 FOREIGN KEY (id_participant) REFERENCES COPROPRIETAIRE (id_coproprietaire) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D19E0AAB82E5C63 FOREIGN KEY (id_mandataire) REFERENCES COPROPRIETAIRE (id_coproprietaire) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D19E0AA83D084AB FOREIGN KEY (id_assemblee_generale) REFERENCES ASSEMBLEE_GENERALE (id_assemblee_generale) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO PARTICIPATION (id_participation, id_participant, id_mandataire, id_assemblee_generale, present) SELECT id_participation, id_participant, id_mandataire, id_assemblee_generale, present FROM __temp__PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__PARTICIPATION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AA83D084AB ON PARTICIPATION (id_assemblee_generale)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AAAB20AB8C ON PARTICIPATION (id_mandataire)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D19E0AA27D43EE1 ON PARTICIPATION (id_participant)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__VOTE AS SELECT id_vote, id_question, id_participation, valeur_vote FROM VOTE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE VOTE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE VOTE (id_vote INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_question INTEGER DEFAULT NULL, id_participation INTEGER DEFAULT NULL, valeur_vote VARCHAR(20) NOT NULL, CONSTRAINT FK_6C8568D0E62CA5DB FOREIGN KEY (id_question) REFERENCES QUESTION (id_question) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6C8568D0157D332A FOREIGN KEY (id_participation) REFERENCES PARTICIPATION (id_participation) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO VOTE (id_vote, id_question, id_participation, valeur_vote) SELECT id_vote, id_question, id_participation, valeur_vote FROM __temp__VOTE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__VOTE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C8568D0E62CA5DB ON VOTE (id_question)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C8568D0157D332A ON VOTE (id_participation)
        SQL);
    }
}
