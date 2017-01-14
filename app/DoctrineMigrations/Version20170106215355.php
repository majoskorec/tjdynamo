<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170106215355 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dynamo_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', chat_color VARCHAR(6) DEFAULT NULL, first_name VARCHAR(24) DEFAULT NULL, last_name VARCHAR(32) DEFAULT NULL, birth_date DATE DEFAULT NULL, birth_place VARCHAR(50) DEFAULT NULL, address VARCHAR(50) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, avatar VARCHAR(100) DEFAULT NULL, member_from DATE DEFAULT NULL, member_till DATE DEFAULT NULL, note LONGTEXT DEFAULT NULL, send_emails TINYINT(1) NOT NULL, membership VARCHAR(16) NOT NULL, created_at DATETIME NOT NULL, email VARCHAR(50) DEFAULT NULL, email_canonical VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_C61C1F292FC23A8 (username_canonical), UNIQUE INDEX UNIQ_C61C1F2C05FB297 (confirmation_token), UNIQUE INDEX UNIQ_C61C1F2A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dynamo_user');
    }
}
