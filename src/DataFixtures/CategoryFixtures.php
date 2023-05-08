<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    // const CATEGORIES = [
    //     '💘',
    //     '🦥',
    //     '🤠',
    //     '😱',
    //     '🍅',
    //     '🚀',
    //     '🎭',
    //     '🕵️‍♀️',
    //     '🧪',
    //     '🦸🏼‍♂️',
    //     '🧟',
    // ];

    const CATEGORIES = [
        '💘 Broken Hearts',
        '🦥 Chill',
        '🤠 Horses & Guns',
        '😱 Not Chill',
        '🍅 Rotten Shows',
        '🚀 To Infinity And Beyond',
        '🎭 To blablabla or not to blablabla',
        '🕵️‍♀️ Elementary',
        '🧪 Experimental',
        '🦸🏼 Pif Paf',
        '🧟 aaarrrghh',
    ];

    public function load(ObjectManager $manager)
    {
        // $category = new Category();
        // $category->setName('😱');
        // $manager->persist($category);
        // $manager->flush();

        // for ($i = 1; $i <= 50; $i++) {
        //     $category = new Category();
        //     $category->setName('Nom de catégorie ' . $i);
        //     $manager->persist($category);
        // }
        // $manager->flush();

        foreach (self::CATEGORIES as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('category_' . $categoryName, $category);
        }
        $manager->flush();
    }
}
