<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109143159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link ADD is_visible_to_logged_in_user TINYINT(1) NOT NULL, ADD is_visible_to_anonymous_user TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE nav_bar_link ADD is_visible_to_logged_in_user TINYINT(1) NOT NULL, ADD is_visible_to_anonymous_user TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nav_bar_dd_link DROP is_visible_to_logged_in_user, DROP is_visible_to_anonymous_user');
        $this->addSql('ALTER TABLE nav_bar_link DROP is_visible_to_logged_in_user, DROP is_visible_to_anonymous_user');
    }
}
