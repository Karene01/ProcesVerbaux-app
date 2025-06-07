<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250607083234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE ASSEMBLEE_GENERALE ADD COLUMN terminee BOOLEAN DEFAULT 0 NOT NULL
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
            CREATE TABLE ASSEMBLEE_GENERALE (id_assemblee_generale INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_copropriete INTEGER DEFAULT NULL, date_assemblee_generale DATETIME NOT NULL, heure_assemblee_generale TIME NOT NULL, ouverte BOOLEAN NOT NULL, CONSTRAINT FK_853401B3FEE9CE2 FOREIGN KEY (id_copropriete) REFERENCES COPROPRIETE (id_copropriete) NOT DEFERRABLE INITIALLY IMMEDIATE)
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
    }
}
