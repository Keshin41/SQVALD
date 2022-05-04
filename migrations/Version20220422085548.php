<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422085548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD content LONGTEXT NOT NULL, CHANGE resume resume VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE news ADD content LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP content, CHANGE resume resume LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE event DROP content');
        $this->addSql('ALTER TABLE news DROP content');
    }
}
