<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104103037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training ADD activity_place_id INT DEFAULT NULL, ADD team_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD day VARCHAR(255) NOT NULL, ADD schedule VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FADAC1217 FOREIGN KEY (activity_place_id) REFERENCES activity_place (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8FADAC1217 ON training (activity_place_id)');
        $this->addSql('CREATE INDEX IDX_D5128A8F296CD8AE ON training (team_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FADAC1217');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F296CD8AE');
        $this->addSql('DROP INDEX IDX_D5128A8FADAC1217 ON training');
        $this->addSql('DROP INDEX IDX_D5128A8F296CD8AE ON training');
        $this->addSql('ALTER TABLE training DROP activity_place_id, DROP team_id, DROP name, DROP day, DROP schedule, DROP created_at, DROP updated_at');
    }
}
