<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201223924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE leagues (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport_matches (id INT AUTO_INCREMENT NOT NULL, league_id INT DEFAULT NULL, first_team_id INT DEFAULT NULL, second_team_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL, source VARCHAR(255) NOT NULL, INDEX IDX_A793591058AFC4DE (league_id), INDEX IDX_A79359103AE0B452 (first_team_id), INDEX IDX_A79359103E2E58C3 (second_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sport_matches ADD CONSTRAINT FK_A793591058AFC4DE FOREIGN KEY (league_id) REFERENCES leagues (id)');
        $this->addSql('ALTER TABLE sport_matches ADD CONSTRAINT FK_A79359103AE0B452 FOREIGN KEY (first_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sport_matches ADD CONSTRAINT FK_A79359103E2E58C3 FOREIGN KEY (second_team_id) REFERENCES team (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_matches DROP FOREIGN KEY FK_A793591058AFC4DE');
        $this->addSql('ALTER TABLE sport_matches DROP FOREIGN KEY FK_A79359103AE0B452');
        $this->addSql('ALTER TABLE sport_matches DROP FOREIGN KEY FK_A79359103E2E58C3');
        $this->addSql('DROP TABLE leagues');
        $this->addSql('DROP TABLE sport_matches');
        $this->addSql('DROP TABLE team');
    }
}
