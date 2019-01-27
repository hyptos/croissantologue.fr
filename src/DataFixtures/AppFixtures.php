<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $array = [
            'Antoine Martin' => ['2018-10-16', '2018-08-07', '2018-11-02', '2018-11-16'],
            'Timothée Boutin' => ['2018-05-22', '2018-11-23'],
            'Kevin Loiseau' => ['2018-09-24', '2018-11-13', '2018-12-18', '2019-01-07'],
            'Yassir El Ayadi' => ['2018-10-09', '2018-11-12', '2018-11-19', '2018-12-21'],
            'Hélène Bucci' => ['2018-09-21', '2018-10-30', '2018-11-19'],
            'Olivier Rosinski' => ['2018-09-19', '2018-09-12', '2018-12-10', '2019-01-21', '2019-01-25'],
            'Alicia Goyon' => ['2018-10-12', '2018-10-04', '2018-07-25'],
            'Florent Gomes' => ['2018-10-12'],
            'Kevin Mollard' => ['2018-11-09', '2018-11-26', '2019-01-21'],
            'Loïc De laforcade' => ['2018-11-09']
        ];


        foreach($array as $user => $arrayDates) {
            // On recherche l'utilisateur
            // On lui ajoute une date de croissant
            // On sauvegarde
        }

        //  php bin/console doctrine:fixtures:load

        $manager->flush();
    }
}
