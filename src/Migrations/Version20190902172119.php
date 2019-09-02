<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902172119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tematic_area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE academic_offer (id INT AUTO_INCREMENT NOT NULL, tematic_area_id INT NOT NULL, offer_type_id INT NOT NULL, institution_id INT NOT NULL, name VARCHAR(255) NOT NULL, duration DOUBLE PRECISION NOT NULL, time_table VARCHAR(255) DEFAULT NULL, course_place VARCHAR(120) DEFAULT NULL, description VARCHAR(1024) DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_DD9EEAFB3270A09 (tematic_area_id), INDEX IDX_DD9EEAFB64444A9A (offer_type_id), INDEX IDX_DD9EEAFB10405986 (institution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE academic_offer_course_mode (academic_offer_id INT NOT NULL, course_mode_id INT NOT NULL, INDEX IDX_CB7A875E6CF6FCF9 (academic_offer_id), INDEX IDX_CB7A875E7F2680A6 (course_mode_id), PRIMARY KEY(academic_offer_id, course_mode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institution_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, surname VARCHAR(120) DEFAULT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institution (id INT AUTO_INCREMENT NOT NULL, institution_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(120) NOT NULL, email VARCHAR(150) NOT NULL, address VARCHAR(255) DEFAULT NULL, lead_price DOUBLE PRECISION NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_3A9F98E5A1B27A01 (institution_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_mode (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `lead` (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, academic_offer_id INT NOT NULL, portal VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, got_from_crm TINYINT(1) NOT NULL, sent_by_email TINYINT(1) NOT NULL, INDEX IDX_289161CBCB944F1A (student_id), INDEX IDX_289161CB6CF6FCF9 (academic_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, institution_id INT NOT NULL, created_at DATETIME NOT NULL, leads_quantity INT NOT NULL, price_per_lead DOUBLE PRECISION NOT NULL, payment_date DATETIME DEFAULT NULL, INDEX IDX_7A2119E310405986 (institution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE academic_offer ADD CONSTRAINT FK_DD9EEAFB3270A09 FOREIGN KEY (tematic_area_id) REFERENCES tematic_area (id)');
        $this->addSql('ALTER TABLE academic_offer ADD CONSTRAINT FK_DD9EEAFB64444A9A FOREIGN KEY (offer_type_id) REFERENCES offer_type (id)');
        $this->addSql('ALTER TABLE academic_offer ADD CONSTRAINT FK_DD9EEAFB10405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE academic_offer_course_mode ADD CONSTRAINT FK_CB7A875E6CF6FCF9 FOREIGN KEY (academic_offer_id) REFERENCES academic_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE academic_offer_course_mode ADD CONSTRAINT FK_CB7A875E7F2680A6 FOREIGN KEY (course_mode_id) REFERENCES course_mode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E5A1B27A01 FOREIGN KEY (institution_type_id) REFERENCES institution_type (id)');
        $this->addSql('ALTER TABLE `lead` ADD CONSTRAINT FK_289161CBCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE `lead` ADD CONSTRAINT FK_289161CB6CF6FCF9 FOREIGN KEY (academic_offer_id) REFERENCES academic_offer (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E310405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE academic_offer DROP FOREIGN KEY FK_DD9EEAFB3270A09');
        $this->addSql('ALTER TABLE academic_offer DROP FOREIGN KEY FK_DD9EEAFB64444A9A');
        $this->addSql('ALTER TABLE academic_offer_course_mode DROP FOREIGN KEY FK_CB7A875E6CF6FCF9');
        $this->addSql('ALTER TABLE `lead` DROP FOREIGN KEY FK_289161CB6CF6FCF9');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E5A1B27A01');
        $this->addSql('ALTER TABLE `lead` DROP FOREIGN KEY FK_289161CBCB944F1A');
        $this->addSql('ALTER TABLE academic_offer DROP FOREIGN KEY FK_DD9EEAFB10405986');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E310405986');
        $this->addSql('ALTER TABLE academic_offer_course_mode DROP FOREIGN KEY FK_CB7A875E7F2680A6');
        $this->addSql('DROP TABLE tematic_area');
        $this->addSql('DROP TABLE offer_type');
        $this->addSql('DROP TABLE academic_offer');
        $this->addSql('DROP TABLE academic_offer_course_mode');
        $this->addSql('DROP TABLE institution_type');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE institution');
        $this->addSql('DROP TABLE course_mode');
        $this->addSql('DROP TABLE lead');
        $this->addSql('DROP TABLE bill');
    }
}
