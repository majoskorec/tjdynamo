<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170107121041 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dynamo_colonization (id INT AUTO_INCREMENT NOT NULL, added_by INT NOT NULL, place VARCHAR(255) DEFAULT NULL, map VARCHAR(255) DEFAULT NULL, date_from DATE NOT NULL, date_to DATE NOT NULL, note LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6C9DCED5699B6BAF (added_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dynamo_colonization_resource (colonization_id INT NOT NULL, resource_id INT NOT NULL, INDEX IDX_52C438D8A88D2AB0 (colonization_id), INDEX IDX_52C438D889329D25 (resource_id), PRIMARY KEY(colonization_id, resource_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dynamo_colonization_user (colonization_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_3BB2C046A88D2AB0 (colonization_id), INDEX IDX_3BB2C046A76ED395 (user_id), PRIMARY KEY(colonization_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dynamo_resource (id INT AUTO_INCREMENT NOT NULL, added_by INT NOT NULL, file_name VARCHAR(255) NOT NULL, dir VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_D3BEB8F1699B6BAF (added_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dynamo_colonization ADD CONSTRAINT FK_6C9DCED5699B6BAF FOREIGN KEY (added_by) REFERENCES dynamo_user (id)');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D8A88D2AB0 FOREIGN KEY (colonization_id) REFERENCES dynamo_colonization (id)');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D889329D25 FOREIGN KEY (resource_id) REFERENCES dynamo_resource (id)');
        $this->addSql('ALTER TABLE dynamo_colonization_user ADD CONSTRAINT FK_3BB2C046A88D2AB0 FOREIGN KEY (colonization_id) REFERENCES dynamo_colonization (id)');
        $this->addSql('ALTER TABLE dynamo_colonization_user ADD CONSTRAINT FK_3BB2C046A76ED395 FOREIGN KEY (user_id) REFERENCES dynamo_user (id)');
        $this->addSql('ALTER TABLE dynamo_resource ADD CONSTRAINT FK_D3BEB8F1699B6BAF FOREIGN KEY (added_by) REFERENCES dynamo_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D8A88D2AB0');
        $this->addSql('ALTER TABLE dynamo_colonization_user DROP FOREIGN KEY FK_3BB2C046A88D2AB0');
        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D889329D25');
        $this->addSql('DROP TABLE dynamo_colonization');
        $this->addSql('DROP TABLE dynamo_colonization_resource');
        $this->addSql('DROP TABLE dynamo_colonization_user');
        $this->addSql('DROP TABLE dynamo_resource');
    }
}
