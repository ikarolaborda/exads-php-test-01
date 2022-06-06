<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220606210129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tvseries_intervals (id_tv_series_id INT NOT NULL, week_day INT NOT NULL, show_time DATETIME NOT NULL, PRIMARY KEY(id_tv_series_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tvseries_intervals ADD CONSTRAINT FK_DAD5AF895A169D1 FOREIGN KEY (id_tv_series_id) REFERENCES tvseries (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tvseries_intervals');
    }
}
