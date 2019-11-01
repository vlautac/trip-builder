<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191101214658 extends AbstractMigration
{
    /**
     * @inheritDoc
     */
    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO airline (code, name) VALUES ("AC", "Air Cananda")');

        $this->addSql('INSERT INTO airport (code, city_code, name, city, country_code, region_code, latitude, longitude, timezone) 
                            VALUES ("YUL", "YMQ", "Pierre Elliott Trudeau International", "Montreal", "CA", "QC", 45.457714, -73.749908, "America/Montreal")');
        $this->addSql('INSERT INTO airport (code, city_code, name, city, country_code, region_code, latitude, longitude, timezone) 
                            VALUES ("YVR", "YVR", "Vancouver International", "Vancouver", "CA", "BC", 49.194698, -123.179192, "America/Vancouver")');

        $this->addSql('INSERT INTO flight (airline, number, departure_airport, departure_time, arrival_airport, arrival_time, price) 
                            VALUES ("AC", "301", "YUL", "07:35", "YVR", "10:05", "273.23")');
        $this->addSql('INSERT INTO flight (airline, number, departure_airport, departure_time, arrival_airport, arrival_time, price) 
                            VALUES ("AC", "302", "YVR", "11:30", "YUL", "19:11", "220.63")');
    }

    /**
     * @inheritDoc
     */
    public function down(Schema $schema) : void
    {
    }
}
