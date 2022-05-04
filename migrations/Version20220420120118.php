<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420120118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_partners DROP FOREIGN KEY FK_F66B564BDE7F1C6');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT DEFAULT NULL, illustration VARCHAR(255) DEFAULT NULL, btn_url VARCHAR(255) DEFAULT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_partner (user_id INT NOT NULL, partner_id INT NOT NULL, INDEX IDX_6926201CA76ED395 (user_id), INDEX IDX_6926201C9393F8FE (partner_id), PRIMARY KEY(user_id, partner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_partner ADD CONSTRAINT FK_6926201CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_partner ADD CONSTRAINT FK_6926201C9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE header');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE user_partners');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_partner DROP FOREIGN KEY FK_6926201C9393F8FE');
        $this->addSql('CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, btn_title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, illustration VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, btn_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_partners (user_id INT NOT NULL, partners_id INT NOT NULL, INDEX IDX_F66B564A76ED395 (user_id), INDEX IDX_F66B564BDE7F1C6 (partners_id), PRIMARY KEY(user_id, partners_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_partners ADD CONSTRAINT FK_F66B564A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_partners ADD CONSTRAINT FK_F66B564BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE user_partner');
    }
}
