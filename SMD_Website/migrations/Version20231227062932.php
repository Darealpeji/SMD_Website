<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231227062932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity_place_section (activity_place_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_186DA4D0ADAC1217 (activity_place_id), INDEX IDX_186DA4D0D823E37A (section_id), PRIMARY KEY(activity_place_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_place_section ADD CONSTRAINT FK_186DA4D0ADAC1217 FOREIGN KEY (activity_place_id) REFERENCES activity_place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_place_section ADD CONSTRAINT FK_186DA4D0D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_place ADD association_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity_place ADD CONSTRAINT FK_6A1F657EEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_6A1F657EEFB9C8A5 ON activity_place (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity_place_section DROP FOREIGN KEY FK_186DA4D0ADAC1217');
        $this->addSql('ALTER TABLE activity_place_section DROP FOREIGN KEY FK_186DA4D0D823E37A');
        $this->addSql('DROP TABLE activity_place_section');
        $this->addSql('ALTER TABLE activity_place DROP FOREIGN KEY FK_6A1F657EEFB9C8A5');
        $this->addSql('DROP INDEX IDX_6A1F657EEFB9C8A5 ON activity_place');
        $this->addSql('ALTER TABLE activity_place DROP association_id');
    }
}
