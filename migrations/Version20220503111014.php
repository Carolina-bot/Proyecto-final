<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503111014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, fecha DATETIME NOT NULL, plato1 VARCHAR(255) NOT NULL, plato2 VARCHAR(255) NOT NULL, plato3 VARCHAR(255) NOT NULL, plato4 VARCHAR(255) NOT NULL, plato5 VARCHAR(255) NOT NULL, plato6 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plato (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, altranuces TINYINT(1) DEFAULT NULL, apio TINYINT(1) DEFAULT NULL, cacahuetes TINYINT(1) DEFAULT NULL, crustaceos TINYINT(1) DEFAULT NULL, sulfitos TINYINT(1) DEFAULT NULL, cascara TINYINT(1) DEFAULT NULL, gluten TINYINT(1) DEFAULT NULL, sesamo TINYINT(1) DEFAULT NULL, huevo TINYINT(1) DEFAULT NULL, lacteos TINYINT(1) DEFAULT NULL, moluscos TINYINT(1) DEFAULT NULL, mostaza TINYINT(1) DEFAULT NULL, pescado TINYINT(1) DEFAULT NULL, soja TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE plato');
    }
}
