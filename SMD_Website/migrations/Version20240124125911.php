<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124125911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_chart_category (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, ranking SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D5C84CDEEFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_chart_category_section (post_chart_category_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_75A98C4128259754 (post_chart_category_id), INDEX IDX_75A98C41D823E37A (section_id), PRIMARY KEY(post_chart_category_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_team_category (id INT AUTO_INCREMENT NOT NULL, name_plural VARCHAR(255) NOT NULL, name_singular VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_team_category_section (post_team_category_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_FD85E4B2BA52AD05 (post_team_category_id), INDEX IDX_FD85E4B2D823E37A (section_id), PRIMARY KEY(post_team_category_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_chart_category ADD CONSTRAINT FK_D5C84CDEEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE post_chart_category_section ADD CONSTRAINT FK_75A98C4128259754 FOREIGN KEY (post_chart_category_id) REFERENCES post_chart_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_chart_category_section ADD CONSTRAINT FK_75A98C41D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_team_category_section ADD CONSTRAINT FK_FD85E4B2BA52AD05 FOREIGN KEY (post_team_category_id) REFERENCES post_team_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_team_category_section ADD CONSTRAINT FK_FD85E4B2D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DD823E37A');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DEFB9C8A5');
        $this->addSql('DROP INDEX IDX_5A8A6C8DD823E37A ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8DEFB9C8A5 ON post');
        $this->addSql('ALTER TABLE post ADD post_chart_category_id INT DEFAULT NULL, ADD post_team_category_id INT DEFAULT NULL, DROP section_id, DROP association_id');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D28259754 FOREIGN KEY (post_chart_category_id) REFERENCES post_chart_category (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DBA52AD05 FOREIGN KEY (post_team_category_id) REFERENCES post_team_category (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D28259754 ON post (post_chart_category_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DBA52AD05 ON post (post_team_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D28259754');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DBA52AD05');
        $this->addSql('ALTER TABLE post_chart_category DROP FOREIGN KEY FK_D5C84CDEEFB9C8A5');
        $this->addSql('ALTER TABLE post_chart_category_section DROP FOREIGN KEY FK_75A98C4128259754');
        $this->addSql('ALTER TABLE post_chart_category_section DROP FOREIGN KEY FK_75A98C41D823E37A');
        $this->addSql('ALTER TABLE post_team_category_section DROP FOREIGN KEY FK_FD85E4B2BA52AD05');
        $this->addSql('ALTER TABLE post_team_category_section DROP FOREIGN KEY FK_FD85E4B2D823E37A');
        $this->addSql('DROP TABLE post_chart_category');
        $this->addSql('DROP TABLE post_chart_category_section');
        $this->addSql('DROP TABLE post_team_category');
        $this->addSql('DROP TABLE post_team_category_section');
        $this->addSql('DROP INDEX IDX_5A8A6C8D28259754 ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8DBA52AD05 ON post');
        $this->addSql('ALTER TABLE post ADD section_id INT DEFAULT NULL, ADD association_id INT DEFAULT NULL, DROP post_chart_category_id, DROP post_team_category_id');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DD823E37A ON post (section_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DEFB9C8A5 ON post (association_id)');
    }
}
