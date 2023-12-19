<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218141559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_link ADD association_id INT DEFAULT NULL, ADD section_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD path VARCHAR(255) NOT NULL, ADD ranking SMALLINT DEFAULT NULL, ADD path_name VARCHAR(255) NOT NULL, ADD creation_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE nav_bar_link ADD CONSTRAINT FK_291E1953EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE nav_bar_link ADD CONSTRAINT FK_291E1953D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_291E1953EFB9C8A5 ON nav_bar_link (association_id)');
        $this->addSql('CREATE INDEX IDX_291E1953D823E37A ON nav_bar_link (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_link DROP FOREIGN KEY FK_291E1953EFB9C8A5');
        $this->addSql('ALTER TABLE nav_bar_link DROP FOREIGN KEY FK_291E1953D823E37A');
        $this->addSql('DROP INDEX IDX_291E1953EFB9C8A5 ON nav_bar_link');
        $this->addSql('DROP INDEX IDX_291E1953D823E37A ON nav_bar_link');
        $this->addSql('ALTER TABLE nav_bar_link DROP association_id, DROP section_id, DROP name, DROP path, DROP ranking, DROP path_name, DROP creation_at, DROP updated_at');
    }
}
