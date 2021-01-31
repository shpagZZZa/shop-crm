<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130123517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title_id INTEGER NOT NULL, description VARCHAR(255) NOT NULL, subdescription VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_64C19C1A9F87BD ON category (title_id)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE product_category (product_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(product_id, category_id))');
        $this->addSql('CREATE INDEX IDX_CDFC73564584665A ON product_category (product_id)');
        $this->addSql('CREATE INDEX IDX_CDFC735612469DE2 ON product_category (category_id)');
        $this->addSql('CREATE TABLE request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER NOT NULL, status_id INTEGER NOT NULL, client_name VARCHAR(255) NOT NULL, client_phone VARCHAR(255) NOT NULL, client_email VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_3B978F9FC54C8C93 ON request (type_id)');
        $this->addSql('CREATE INDEX IDX_3B978F9F6BF700BD ON request (status_id)');
        $this->addSql('CREATE TABLE request_status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE request_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE shop (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, settings CLOB NOT NULL --(DC2Type:json)
        , backend_url VARCHAR(255) DEFAULT NULL, unique_id VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE request_status');
        $this->addSql('DROP TABLE request_type');
        $this->addSql('DROP TABLE shop');
    }
}
