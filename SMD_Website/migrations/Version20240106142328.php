<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106142328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, competition TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AC74095AD823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_class (id INT AUTO_INCREMENT NOT NULL, activity_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F3492F2C81C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_class_training (activity_class_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_FDD495BF4A0ABB1E (activity_class_id), INDEX IDX_FDD495BFBEFD98D1 (training_id), PRIMARY KEY(activity_class_id, training_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE activity_class ADD CONSTRAINT FK_F3492F2C81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE activity_class_training ADD CONSTRAINT FK_FDD495BF4A0ABB1E FOREIGN KEY (activity_class_id) REFERENCES activity_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_class_training ADD CONSTRAINT FK_FDD495BFBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AD823E37A');
        $this->addSql('ALTER TABLE activity_class DROP FOREIGN KEY FK_F3492F2C81C06096');
        $this->addSql('ALTER TABLE activity_class_training DROP FOREIGN KEY FK_FDD495BF4A0ABB1E');
        $this->addSql('ALTER TABLE activity_class_training DROP FOREIGN KEY FK_FDD495BFBEFD98D1');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_class');
        $this->addSql('DROP TABLE activity_class_training');
    }
}
