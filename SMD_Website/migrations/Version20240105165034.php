<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240105165034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_training (team_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_6D5056F1296CD8AE (team_id), INDEX IDX_6D5056F1BEFD98D1 (training_id), PRIMARY KEY(team_id, training_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_training ADD CONSTRAINT FK_6D5056F1296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_training ADD CONSTRAINT FK_6D5056F1BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F296CD8AE');
        $this->addSql('DROP INDEX IDX_D5128A8F296CD8AE ON training');
        $this->addSql('ALTER TABLE training DROP team_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_training DROP FOREIGN KEY FK_6D5056F1296CD8AE');
        $this->addSql('ALTER TABLE team_training DROP FOREIGN KEY FK_6D5056F1BEFD98D1');
        $this->addSql('DROP TABLE team_training');
        $this->addSql('ALTER TABLE training ADD team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8F296CD8AE ON training (team_id)');
    }
}
