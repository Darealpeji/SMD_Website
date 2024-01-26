<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125095935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE institutional_partner (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1D8C0FD8EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institutional_partner_section (institutional_partner_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_8B890142864D7261 (institutional_partner_id), INDEX IDX_8B890142D823E37A (section_id), PRIMARY KEY(institutional_partner_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE institutional_partner ADD CONSTRAINT FK_1D8C0FD8EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE institutional_partner_section ADD CONSTRAINT FK_8B890142864D7261 FOREIGN KEY (institutional_partner_id) REFERENCES institutional_partner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE institutional_partner_section ADD CONSTRAINT FK_8B890142D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsor ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE institutional_partner DROP FOREIGN KEY FK_1D8C0FD8EFB9C8A5');
        $this->addSql('ALTER TABLE institutional_partner_section DROP FOREIGN KEY FK_8B890142864D7261');
        $this->addSql('ALTER TABLE institutional_partner_section DROP FOREIGN KEY FK_8B890142D823E37A');
        $this->addSql('DROP TABLE institutional_partner');
        $this->addSql('DROP TABLE institutional_partner_section');
        $this->addSql('ALTER TABLE sponsor DROP description');
    }
}
