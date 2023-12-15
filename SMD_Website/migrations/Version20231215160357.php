<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215160357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association ADD name VARCHAR(255) NOT NULL, ADD motto VARCHAR(255) DEFAULT NULL, ADD adress_name VARCHAR(255) DEFAULT NULL, ADD adress VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(7) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD mail VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE section ADD association_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD motto VARCHAR(255) DEFAULT NULL, ADD path_name VARCHAR(255) DEFAULT NULL, ADD adress_name VARCHAR(255) DEFAULT NULL, ADD adress VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(7) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD mail VARCHAR(255) DEFAULT NULL, ADD score_nco_code VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEFEFB9C8A5 ON section (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFEFB9C8A5');
        $this->addSql('DROP INDEX IDX_2D737AEFEFB9C8A5 ON section');
        $this->addSql('ALTER TABLE section DROP association_id, DROP name, DROP motto, DROP path_name, DROP adress_name, DROP adress, DROP postal_code, DROP phone, DROP mail, DROP score_nco_code, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE association DROP name, DROP motto, DROP adress_name, DROP adress, DROP postal_code, DROP phone, DROP mail, DROP created_at, DROP updated_at');
    }
}
