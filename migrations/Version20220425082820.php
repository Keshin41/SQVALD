<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425082820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_partner');
        $this->addSql('ALTER TABLE user DROP username, DROP field_of_research, DROP studylevel, DROP picture');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_partner (user_id INT NOT NULL, partner_id INT NOT NULL, INDEX IDX_6926201CA76ED395 (user_id), INDEX IDX_6926201C9393F8FE (partner_id), PRIMARY KEY(user_id, partner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_partner ADD CONSTRAINT FK_6926201C9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_partner ADD CONSTRAINT FK_6926201CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) DEFAULT NULL, ADD field_of_research VARCHAR(255) DEFAULT NULL, ADD studylevel VARCHAR(255) DEFAULT NULL, ADD picture VARCHAR(255) DEFAULT NULL');
    }
}
