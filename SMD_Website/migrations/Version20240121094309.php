<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240121094309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role_section (role_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_91BEDF14D60322AC (role_id), INDEX IDX_91BEDF14D823E37A (section_id), PRIMARY KEY(role_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_section ADD CONSTRAINT FK_91BEDF14D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_section ADD CONSTRAINT FK_91BEDF14D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AD823E37A');
        $this->addSql('DROP INDEX IDX_57698A6AD823E37A ON role');
        $this->addSql('ALTER TABLE role DROP section_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_section DROP FOREIGN KEY FK_91BEDF14D60322AC');
        $this->addSql('ALTER TABLE role_section DROP FOREIGN KEY FK_91BEDF14D823E37A');
        $this->addSql('DROP TABLE role_section');
        $this->addSql('ALTER TABLE role ADD section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_57698A6AD823E37A ON role (section_id)');
    }
}
