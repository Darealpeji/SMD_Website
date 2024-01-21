<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240121082324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, section_id INT DEFAULT NULL, association_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_57698A6AD823E37A (section_id), INDEX IDX_57698A6AEFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_member (role_id INT NOT NULL, member_id INT NOT NULL, INDEX IDX_DBC21BC9D60322AC (role_id), INDEX IDX_DBC21BC97597D3FE (member_id), PRIMARY KEY(role_id, member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE role_member ADD CONSTRAINT FK_DBC21BC9D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_member ADD CONSTRAINT FK_DBC21BC97597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AD823E37A');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AEFB9C8A5');
        $this->addSql('ALTER TABLE role_member DROP FOREIGN KEY FK_DBC21BC9D60322AC');
        $this->addSql('ALTER TABLE role_member DROP FOREIGN KEY FK_DBC21BC97597D3FE');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_member');
        $this->addSql('ALTER TABLE member ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
