<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231220114347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link CHANGE path_name slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE nav_bar_link CHANGE path_name slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link CHANGE slug path_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE nav_bar_link CHANGE slug path_name VARCHAR(255) NOT NULL');
    }
}
