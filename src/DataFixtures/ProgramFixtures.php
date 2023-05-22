<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\ReferenceRepository;


class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wildSeries = [
            [
                'title' => 'The Wild Wild Wild',
                'synopsis' => 'Walking in the wild',
                'country' => 'Wild West',
                'year' => '1974',
                'category' => 'category_🤠 Horses & Guns',
            ],
            [
                'title' => 'Power Wilders',
                'synopsis' => 'Rainbow fighters fighting',
                'country' => 'SuperCity',
                'year' => '1993',
                'category' => 'category_🦸🏼 Pif Paf',
            ],
            [
                'title' => 'Breaking Wild',
                'synopsis' => 'Badly managed professional retraining',
                'country' => 'New Mexico',
                'year' => '2008',
                'category' => 'category_🧪 Experimental',
            ],
            [
                'title' => 'The Walking Wild',
                'synopsis' => 'Wild zoo + PHP virus... aaarrrrghhhh',
                'country' => 'Bordeaux',
                'year' => '2023',
                'category' => 'category_🧟 aaarrrghh',
            ],
            [
                'title' => 'Wild High',
                'synopsis' => 'Young people, wild make-up & the shark pool, whhaaaat ?!',
                'country' => 'Sydney Baby',
                'year' => '1998',
                'category' => 'category_💘 Broken Hearts',
            ],

        ];

        foreach ($wildSeries as $seriesData) {
            $series = new Program();
            $series->setTitle($seriesData['title']);
            $series->setSynopsis($seriesData['synopsis']);
            $series->setCountry($seriesData['country']);
            $series->setYear($seriesData['year']);

            $category = $this->getReference($seriesData['category']);
            $series->setCategory($category);

            $manager->persist($series);

            // Ajouter une référence à chaque série
            $this->referenceRepository->setReference('program_' . $seriesData['title'], $series);
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

    // public function load(ObjectManager $manager)
    // {
    //     $program = new Program();
    //     $program->setTitle('Wild Wild West');
    //     $program->setSynopsis('Des cowboys se promènent dans l\'ouest');
    //     $program->setCategory($this->getReference('category_🤠'));
    //     $manager->persist($program);
    //     $manager->flush();
    // }