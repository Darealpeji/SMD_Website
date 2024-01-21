<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111112737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_member (post_id INT NOT NULL, member_id INT NOT NULL, INDEX IDX_40C61E1D4B89032C (post_id), INDEX IDX_40C61E1D7597D3FE (member_id), PRIMARY KEY(post_id, member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_team (post_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_DB5C1144B89032C (post_id), INDEX IDX_DB5C114296CD8AE (team_id), PRIMARY KEY(post_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_activity_class (post_id INT NOT NULL, activity_class_id INT NOT NULL, INDEX IDX_77E81F4C4B89032C (post_id), INDEX IDX_77E81F4C4A0ABB1E (activity_class_id), PRIMARY KEY(post_id, activity_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_member ADD CONSTRAINT FK_40C61E1D4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_member ADD CONSTRAINT FK_40C61E1D7597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_team ADD CONSTRAINT FK_DB5C1144B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_team ADD CONSTRAINT FK_DB5C114296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_activity_class ADD CONSTRAINT FK_77E81F4C4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_activity_class ADD CONSTRAINT FK_77E81F4C4A0ABB1E FOREIGN KEY (activity_class_id) REFERENCES activity_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD section_id INT DEFAULT NULL, ADD association_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD label VARCHAR(255) NOT NULL, ADD ranking SMALLINT DEFAULT NULL, ADD hierarchical_group VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DD823E37A ON post (section_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DEFB9C8A5 ON post (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_member DROP FOREIGN KEY FK_40C61E1D4B89032C');
        $this->addSql('ALTER TABLE post_member DROP FOREIGN KEY FK_40C61E1D7597D3FE');
        $this->addSql('ALTER TABLE post_team DROP FOREIGN KEY FK_DB5C1144B89032C');
        $this->addSql('ALTER TABLE post_team DROP FOREIGN KEY FK_DB5C114296CD8AE');
        $this->addSql('ALTER TABLE post_activity_class DROP FOREIGN KEY FK_77E81F4C4B89032C');
        $this->addSql('ALTER TABLE post_activity_class DROP FOREIGN KEY FK_77E81F4C4A0ABB1E');
        $this->addSql('DROP TABLE post_member');
        $this->addSql('DROP TABLE post_team');
        $this->addSql('DROP TABLE post_activity_class');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DD823E37A');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DEFB9C8A5');
        $this->addSql('DROP INDEX IDX_5A8A6C8DD823E37A ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8DEFB9C8A5 ON post');
        $this->addSql('ALTER TABLE post DROP section_id, DROP association_id, DROP name, DROP label, DROP ranking, DROP hierarchical_group, DROP created_at, DROP updated_at');
    }
}
