<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124153818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_chart_category ADD label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE post_team_category ADD name VARCHAR(255) NOT NULL, ADD label_plural VARCHAR(255) NOT NULL, ADD label_singular VARCHAR(255) NOT NULL, DROP name_plural, DROP name_singular');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_team_category ADD name_plural VARCHAR(255) NOT NULL, ADD name_singular VARCHAR(255) NOT NULL, DROP name, DROP label_plural, DROP label_singular');
        $this->addSql('ALTER TABLE post_chart_category DROP label');
    }
}
