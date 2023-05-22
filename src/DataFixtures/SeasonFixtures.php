<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    //     $seasons = [
    //         [
    //             'number' => 1,
    //             'year' => 1974,
    //             'description' => 'WWW Origins',
    //             'program' => $program1
    //         ],
    //         [
    //             'number' => 2,
    //             'year' => 1984,
    //             'description' => 'WWW Returns',
    //             'program' => $program1
    //         ],
    //         [
    //             'number' => 3,
    //             'year' => 1994,
    //             'description' => 'The End',
    //             'program' => $program1
    //         ],
    //         [
    //             'number' => 1,
    //             'year' => 1994,
    //             'description' => 'Season 1 of Power Wilders',
    //             'program' => $program2
    //         ],
    //         [
    //             'number' => 1,
    //             'year' => 2009,
    //             'description' => 'Season 1 of Breaking Wild',
    //             'program' => $program3
    //         ],
    //         [
    //             'number' => 1,
    //             'year' => 2024,
    //             'description' => 'Season 1 of The Walking Wild',
    //             'program' => $program4
    //         ],
    //         [
    //             'number' => 1,
    //             'year' => 1999,
    //             'description' => 'Season 1 of Wild High',
    //             'program' => $program5
    //         ]
    //     ];


    public function load(ObjectManager $manager)
    {
        $wildSeasons = [
            [
                'program' => 'program_The Wild Wild Wild',
                'number' => '1',
                'year' => '1974',
                'description' => 'Origins',

            ],
            [
                'program' => 'program_The Wild Wild Wild',
                'number' => '2',
                'year' => '1984',
                'description' => 'Returns',
            ],
            [
                'program' => 'program_The Wild Wild Wild',
                'number' => '3',
                'year' => '1994',
                'description' => 'The End',
            ],
        ];

        foreach ($wildSeasons as $i=>$seasonData) {
            $season = new Season();

            $program = $this->getReference($seasonData['program']);
            $season->setProgram($program);

            $season->setNumber($seasonData['number']);
            $season->setYear($seasonData['year']);
            $season->setDescription($seasonData['description']);

            $manager->persist($season);

            $this->addReference('season_'.$i, $season);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
