<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231228052520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team ADD team_category_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD score_nco_code VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FF97672AF FOREIGN KEY (team_category_id) REFERENCES team_category (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FF97672AF ON team (team_category_id)');
        $this->addSql('ALTER TABLE team_category ADD section_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE team_category ADD CONSTRAINT FK_BE0EC5BFD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_BE0EC5BFD823E37A ON team_category (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_category DROP FOREIGN KEY FK_BE0EC5BFD823E37A');
        $this->addSql('DROP INDEX IDX_BE0EC5BFD823E37A ON team_category');
        $this->addSql('ALTER TABLE team_category DROP section_id, DROP name, DROP title, DROP slug, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FF97672AF');
        $this->addSql('DROP INDEX IDX_C4E0A61FF97672AF ON team');
        $this->addSql('ALTER TABLE team DROP team_category_id, DROP name, DROP score_nco_code, DROP created_at, DROP updated_at');
    }
}
