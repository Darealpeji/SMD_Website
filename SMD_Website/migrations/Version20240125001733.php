<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125001733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sponsor_section (sponsor_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_671D74AD12F7FB51 (sponsor_id), INDEX IDX_671D74ADD823E37A (section_id), PRIMARY KEY(sponsor_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sponsor_section ADD CONSTRAINT FK_671D74AD12F7FB51 FOREIGN KEY (sponsor_id) REFERENCES sponsor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsor_section ADD CONSTRAINT FK_671D74ADD823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsor ADD association_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D4EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_818CC9D4EFB9C8A5 ON sponsor (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sponsor_section DROP FOREIGN KEY FK_671D74AD12F7FB51');
        $this->addSql('ALTER TABLE sponsor_section DROP FOREIGN KEY FK_671D74ADD823E37A');
        $this->addSql('DROP TABLE sponsor_section');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D4EFB9C8A5');
        $this->addSql('DROP INDEX IDX_818CC9D4EFB9C8A5 ON sponsor');
        $this->addSql('ALTER TABLE sponsor DROP association_id');
    }
}
