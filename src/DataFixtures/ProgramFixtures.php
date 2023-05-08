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
                'title' => 'The Wild Wild Wild',
                'synopsis' => 'Des cowboys se promènent dans l\'wild',
                'category' => 'category_🤠 Horses & Guns',
            ],
            [
                'title' => 'Power Wilders',
                'synopsis' => 'Pouvoir sauvage',
                'category' => 'category_🦸🏼 Pif Paf',
            ],
            [
                'title' => 'Breaking Wild',
                'synopsis' => 'Une reconversion professionnelle qui tourne mal',
                'category' => 'category_🧪 Experimental',
            ],
            [
                'title' => 'The Walking Wild',
                'synopsis' => 'Le wild zoo, un virus... aaarrrrghhhh',
                'category' => 'category_🧟 aaarrrghh',
            ],
            [
                'title' => 'Wild High',
                'synopsis' => 'Des jeunes, a bunch of wild make-up et le shark pool',
                'category' => 'category_💘 Broken Hearts',
            ],

        ];

        // $wildSeries = [
        //     [
        //         'title' => 'The Wild Wild Wild',
        //         'synopsis' => 'Des cowboys se promènent dans l\'wild',
        //         'category' => $this->getReference('category_🤠')->getId(),
        //     ],
        //     [
        //         'title' => 'Power Wilders',
        //         'synopsis' => 'Pouvoir sauvage',
        //         'category' => $this->getReference('category_🦸🏼‍♂️')->getId(),
        //     ],
        //     [
        //         'title' => 'Breaking Wild',
        //         'synopsis' => 'Une reconversion professionnelle qui tourne mal',
        //         'category' => $this->getReference('category_🧪')->getId(),
        //     ],
        //     [
        //         'title' => 'The Walking Wild',
        //         'synopsis' => 'Le wild zoo, un virus... aaarrrrghhhh',
        //         'category' => $this->getReference('category_🧟')->getId(),
        //     ],
        //     [
        //         'title' => 'Wild High',
        //         'synopsis' => 'Des jeunes, a bunch of wild make-up et le shark pool',
        //         'category' => $this->getReference('category_💘')->getId(),
        //     ],

        // ];

        foreach ($wildSeries as $seriesData) {
            $series = new Program();
            $series->setTitle($seriesData['title']);
            $series->setSynopsis($seriesData['synopsis']);
            $category = $this->getReference($seriesData['category']);
            $series->setCategory($category);
            // $series->setCategory($this->getReference($seriesData['category']));
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
