<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422080300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950437F7458');
        $this->addSql('DROP INDEX IDX_1DD39950437F7458 ON news');
        $this->addSql('ALTER TABLE news DROP categorynews_id, DROP start_created_at, DROP end_created_at, DROP place, DROP update_at, DROP duration_of_publication, DROP picture');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news ADD categorynews_id INT DEFAULT NULL, ADD start_created_at DATETIME DEFAULT NULL, ADD end_created_at DATETIME DEFAULT NULL, ADD place VARCHAR(255) DEFAULT NULL, ADD update_at DATETIME NOT NULL, ADD duration_of_publication INT DEFAULT NULL, ADD picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950437F7458 FOREIGN KEY (categorynews_id) REFERENCES category_news (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950437F7458 ON news (categorynews_id)');
    }
}
