<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221160534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD association_id INT DEFAULT NULL, ADD section_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD content LONGTEXT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66EFB9C8A5 ON article (association_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66D823E37A ON article (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66EFB9C8A5');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D823E37A');
        $this->addSql('DROP INDEX IDX_23A0E66EFB9C8A5 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66D823E37A ON article');
        $this->addSql('ALTER TABLE article DROP association_id, DROP section_id, DROP title, DROP content, DROP created_at, DROP updated_at');
    }
}
