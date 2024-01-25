<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229134312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member_section (member_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_9287CD7B7597D3FE (member_id), INDEX IDX_9287CD7BD823E37A (section_id), PRIMARY KEY(member_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_section ADD CONSTRAINT FK_9287CD7B7597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_section ADD CONSTRAINT FK_9287CD7BD823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member ADD association_id INT DEFAULT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78EFB9C8A5 ON member (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member_section DROP FOREIGN KEY FK_9287CD7B7597D3FE');
        $this->addSql('ALTER TABLE member_section DROP FOREIGN KEY FK_9287CD7BD823E37A');
        $this->addSql('DROP TABLE member_section');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78EFB9C8A5');
        $this->addSql('DROP INDEX IDX_70E4FA78EFB9C8A5 ON member');
        $this->addSql('ALTER TABLE member DROP association_id, DROP first_name, DROP last_name, DROP created_at, DROP updated_at');
    }
}
