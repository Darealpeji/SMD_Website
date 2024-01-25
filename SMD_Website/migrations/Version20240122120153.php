<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240122120153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE historical_date (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, section_id INT DEFAULT NULL, year SMALLINT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A4C7CFDBEFB9C8A5 (association_id), INDEX IDX_A4C7CFDBD823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historical_date ADD CONSTRAINT FK_A4C7CFDBEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE historical_date ADD CONSTRAINT FK_A4C7CFDBD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE association ADD presentation LONGTEXT DEFAULT NULL, ADD historical LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE section ADD presentation LONGTEXT DEFAULT NULL, ADD historical LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historical_date DROP FOREIGN KEY FK_A4C7CFDBEFB9C8A5');
        $this->addSql('ALTER TABLE historical_date DROP FOREIGN KEY FK_A4C7CFDBD823E37A');
        $this->addSql('DROP TABLE historical_date');
        $this->addSql('ALTER TABLE section DROP presentation, DROP historical');
        $this->addSql('ALTER TABLE association DROP presentation, DROP historical');
    }
}
