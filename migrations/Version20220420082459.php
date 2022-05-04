<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420082459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documenttype_user DROP FOREIGN KEY FK_FB9DA778821DDA76');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, categorydonnees_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, update_at DATETIME NOT NULL, is_active TINYINT(1) DEFAULT NULL, brochure_filename VARCHAR(255) DEFAULT NULL, duration_of_publication INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_D8698A76C5290191 (categorydonnees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_user (document_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2A275ADAC33F7837 (document_id), INDEX IDX_2A275ADAA76ED395 (user_id), PRIMARY KEY(document_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76C5290191 FOREIGN KEY (categorydonnees_id) REFERENCES category_donnees (id)');
        $this->addSql('ALTER TABLE document_user ADD CONSTRAINT FK_2A275ADAC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_user ADD CONSTRAINT FK_2A275ADAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE documenttype');
        $this->addSql('DROP TABLE documenttype_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_user DROP FOREIGN KEY FK_2A275ADAC33F7837');
        $this->addSql('CREATE TABLE documenttype (id INT AUTO_INCREMENT NOT NULL, categorydonnees_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, resume LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, update_at DATETIME NOT NULL, is_active TINYINT(1) DEFAULT NULL, brochure_filename VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, duration_of_publication INT DEFAULT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_121FBC37C5290191 (categorydonnees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE documenttype_user (documenttype_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FB9DA778821DDA76 (documenttype_id), INDEX IDX_FB9DA778A76ED395 (user_id), PRIMARY KEY(documenttype_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE documenttype ADD CONSTRAINT FK_121FBC37C5290191 FOREIGN KEY (categorydonnees_id) REFERENCES category_donnees (id)');
        $this->addSql('ALTER TABLE documenttype_user ADD CONSTRAINT FK_FB9DA778821DDA76 FOREIGN KEY (documenttype_id) REFERENCES documenttype (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documenttype_user ADD CONSTRAINT FK_FB9DA778A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_user');
    }
}
