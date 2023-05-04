<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    // public function load(ObjectManager $manager)
    // {
    //     $program = new Program();
    //     $program->setTitle('Wild Wild West');
    //     $program->setSynopsis('Des cowboys se promènent dans l\'ouest');
    //     $program->setCategory($this->getReference('category_🤠'));
    //     $manager->persist($program);
    //     $manager->flush();
    // }

    public function load(ObjectManager $manager)
    {
        $wildSeries = [
            [
                'title' => 'The Wild Wild West (1965–1969)',
                'synopsis' => 'Des cowboys se promènent dans l\'ouest',
                'category' => 'category_🤠',
            ],
            [
                'title' => 'Power Rangers Wild Force (2002–2003)',
                'synopsis' => 'Les Power Rangers combattent une armée d\'animaux sauvages menée par l\'empereur Org. Une révélation',
                'category' => 'category_🦸🏼‍♂️',
            ],
            [
                'title' => 'Wild at Heart (2006–2013)',
                'synopsis' => 'Une famille anglaise décide de s\'installer en Afrique du Sud pour vivre avec les lions. Boring...',
                'category' => 'category_🦁',
            ],
            [
                'title' => 'The Wild Thornberrys (1998–2004)',
                'synopsis' => 'Une famille de documentaristes animaliers parcourt le monde à la recherche de la faune sauvage.',
                'category' => 'category_🔥',
            ],
            [
                'title' => 'Heartbreak Wild High (1994–1999)',
                'synopsis' => 'Des faux jeunes, du drama, a bunch of wild make-up et le shark pool ...',
                'category' => 'category_💘',
            ],

        ];

        foreach ($wildSeries as $seriesData) {
            $series = new Program();
            $series->setTitle($seriesData['title']);
            $series->setSynopsis($seriesData['synopsis']);
            $series->setCategory($this->getReference($seriesData['category']));
            $manager->persist($series);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
