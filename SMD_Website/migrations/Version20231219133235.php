<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231219133235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link ADD nav_bar_link_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD link_title VARCHAR(255) NOT NULL, ADD path_name VARCHAR(255) NOT NULL, ADD path VARCHAR(255) NOT NULL, ADD ranking SMALLINT DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE nav_bar_dd_link ADD CONSTRAINT FK_184B27C969B4C18B FOREIGN KEY (nav_bar_link_id) REFERENCES nav_bar_link (id)');
        $this->addSql('CREATE INDEX IDX_184B27C969B4C18B ON nav_bar_dd_link (nav_bar_link_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link DROP FOREIGN KEY FK_184B27C969B4C18B');
        $this->addSql('DROP INDEX IDX_184B27C969B4C18B ON nav_bar_dd_link');
        $this->addSql('ALTER TABLE nav_bar_dd_link DROP nav_bar_link_id, DROP name, DROP link_title, DROP path_name, DROP path, DROP ranking, DROP created_at, DROP updated_at');
    }
}
