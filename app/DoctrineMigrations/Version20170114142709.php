<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170114142709 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D889329D25');
        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D8A88D2AB0');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D889329D25 FOREIGN KEY (resource_id) REFERENCES dynamo_resource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D8A88D2AB0 FOREIGN KEY (colonization_id) REFERENCES dynamo_colonization (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D8A88D2AB0');
        $this->addSql('ALTER TABLE dynamo_colonization_resource DROP FOREIGN KEY FK_52C438D889329D25');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D8A88D2AB0 FOREIGN KEY (colonization_id) REFERENCES dynamo_colonization (id)');
        $this->addSql('ALTER TABLE dynamo_colonization_resource ADD CONSTRAINT FK_52C438D889329D25 FOREIGN KEY (resource_id) REFERENCES dynamo_resource (id)');
    }
}
