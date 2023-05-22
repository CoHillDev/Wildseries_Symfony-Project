<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $wildEpisodes = [
            [
                'number' => '1',
                'title' => 'Intro The Wild',
                'synopsis' => 'Wild West episode 1, intro',
            ],
            [
                'number' => '2',
                'title' => 'Wild is the law',
                'synopsis' => 'Wild West episode 2, the sheriff arrives',
            ],
            [
                'number' => '3',
                'title' => 'Wild town',
                'synopsis' => 'Wild West episode 3, the town is in danger',
            ],
        ];

        foreach ($wildEpisodes as $episodeData) {
            $episode = new Episode();
            $episode->setNumber($episodeData['number']);
            $episode->setTitle($episodeData['title']);

            // $seasonReference = $episodeData['season'] ?? 'season_';
            // $season = $this->getReference($seasonReference);
            // $episode->setSeason($season);

            $season = $this->getReference('season_0');
            $episode->setSeason($season);

            $episode->setSynopsis($episodeData['synopsis']);

            $manager->persist($episode);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
