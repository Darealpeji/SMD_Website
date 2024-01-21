<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110121328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nav_bar_menu (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, section_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, route_name VARCHAR(255) NOT NULL, ranking SMALLINT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_62B7BA31EFB9C8A5 (association_id), INDEX IDX_62B7BA31D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nav_bar_sub_menu (id INT AUTO_INCREMENT NOT NULL, nav_bar_menu_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, route_name VARCHAR(255) NOT NULL, ranking SMALLINT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_73FAE938C72AE8 (nav_bar_menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nav_bar_sub_menu_logged_in_member (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, route_name VARCHAR(255) DEFAULT NULL, ranking SMALLINT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nav_bar_menu ADD CONSTRAINT FK_62B7BA31EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE nav_bar_menu ADD CONSTRAINT FK_62B7BA31D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE nav_bar_sub_menu ADD CONSTRAINT FK_73FAE938C72AE8 FOREIGN KEY (nav_bar_menu_id) REFERENCES nav_bar_menu (id)');
        $this->addSql('ALTER TABLE nav_bar_dd_link DROP FOREIGN KEY FK_184B27C969B4C18B');
        $this->addSql('ALTER TABLE nav_bar_link DROP FOREIGN KEY FK_291E1953EFB9C8A5');
        $this->addSql('ALTER TABLE nav_bar_link DROP FOREIGN KEY FK_291E1953D823E37A');
        $this->addSql('DROP TABLE nav_bar_dd_link');
        $this->addSql('DROP TABLE nav_bar_link');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nav_bar_dd_link (id INT AUTO_INCREMENT NOT NULL, nav_bar_link_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, route_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ranking SMALLINT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_visible_to_logged_in_user TINYINT(1) NOT NULL, is_visible_to_anonymous_user TINYINT(1) NOT NULL, INDEX IDX_184B27C969B4C18B (nav_bar_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nav_bar_link (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, section_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, route_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ranking SMALLINT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_visible_to_logged_in_user TINYINT(1) NOT NULL, is_visible_to_anonymous_user TINYINT(1) NOT NULL, INDEX IDX_291E1953EFB9C8A5 (association_id), INDEX IDX_291E1953D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nav_bar_dd_link ADD CONSTRAINT FK_184B27C969B4C18B FOREIGN KEY (nav_bar_link_id) REFERENCES nav_bar_link (id)');
        $this->addSql('ALTER TABLE nav_bar_link ADD CONSTRAINT FK_291E1953EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE nav_bar_link ADD CONSTRAINT FK_291E1953D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE nav_bar_menu DROP FOREIGN KEY FK_62B7BA31EFB9C8A5');
        $this->addSql('ALTER TABLE nav_bar_menu DROP FOREIGN KEY FK_62B7BA31D823E37A');
        $this->addSql('ALTER TABLE nav_bar_sub_menu DROP FOREIGN KEY FK_73FAE938C72AE8');
        $this->addSql('DROP TABLE nav_bar_menu');
        $this->addSql('DROP TABLE nav_bar_sub_menu');
        $this->addSql('DROP TABLE nav_bar_sub_menu_logged_in_member');
    }
}
