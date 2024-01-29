<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125124818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE static_page_content (id INT AUTO_INCREMENT NOT NULL, static_page_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A93EC90495C43776 (static_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE static_page_content ADD CONSTRAINT FK_A93EC90495C43776 FOREIGN KEY (static_page_id) REFERENCES static_page (id)');
        $this->addSql('ALTER TABLE content_static_page DROP FOREIGN KEY FK_DC8E451395C43776');
        $this->addSql('DROP TABLE content_static_page');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_static_page (id INT AUTO_INCREMENT NOT NULL, static_page_id INT NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DC8E451395C43776 (static_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE content_static_page ADD CONSTRAINT FK_DC8E451395C43776 FOREIGN KEY (static_page_id) REFERENCES static_page (id)');
        $this->addSql('ALTER TABLE static_page_content DROP FOREIGN KEY FK_A93EC90495C43776');
        $this->addSql('DROP TABLE static_page_content');
    }
}
