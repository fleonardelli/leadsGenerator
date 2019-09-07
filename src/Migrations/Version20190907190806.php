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

        $this->addSql('INSERT INTO `offer_type` (`id`, `name`, `active`)
            VALUES
                (1, \'curso\', 1),
                (2, \'carrera\', 1),
                (3, \'postgrado\', 1),
                (4, \'master\', 1);
            ');

        $this->addSql('INSERT INTO `course_mode` (`id`, `name`, `active`)
            VALUES
                (1, \'a distancia\', 1),
                (2, \'presencial\', 1),
                (3, \'semipresencial\', 1);
            ');

        $this->addSql('INSERT INTO `tematic_area` (`id`, `name`, `active`)
            VALUES
                (1, \'Humanidades\', 1),
                (2, \'Matematica\', 1),
                (3, \'Informática\', 1),
                (4, \'Lengua\', 1),
                (5, \'Sociales\', 1);
            ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
