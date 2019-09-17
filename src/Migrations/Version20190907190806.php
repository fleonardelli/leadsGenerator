<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190907190806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // ======== THESE ARE MINIMAL FIXTURES FOR THE APP ====== //
        $this->addSql('INSERT INTO `institution_type` (`id`, `name`)
            VALUES
                (1, \'escuela\'),
                (2, \'universidad\'),
                (3, \'instituto\');
            ');

        $this->addSql('INSERT INTO `offer_type` (`id`, `name`)
            VALUES
                (1, \'curso\'),
                (2, \'carrera\'),
                (3, \'postgrado\'),
                (4, \'master\');
            ');

        $this->addSql('INSERT INTO `course_mode` (`id`, `name`)
            VALUES
                (1, \'a distancia\'),
                (2, \'presencial\'),
                (3, \'semipresencial\');
            ');

        $this->addSql('INSERT INTO `tematic_area` (`id`, `name`)
            VALUES
                (1, \'Humanidades\'),
                (2, \'Matematica\'),
                (3, \'Informática\'),
                (4, \'Lengua\'),
                (5, \'Sociales\');
            ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
