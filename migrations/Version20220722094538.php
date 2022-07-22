<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722094538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD address VARCHAR(255) NOT NULL, ADD phone_number VARCHAR(255) NOT NULL, DROP adress, DROP phone, DROP number, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reseller ADD roles JSON NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE company company VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18015899E7927C74 ON reseller (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD adress VARCHAR(255) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD number NUMERIC(10, 0) DEFAULT NULL, DROP address, DROP phone_number, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_18015899E7927C74 ON reseller');
        $this->addSql('ALTER TABLE reseller DROP roles, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL');
    }
}
