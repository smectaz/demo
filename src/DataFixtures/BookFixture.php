<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle('notre dame de paris');
        $book->setDescription('l\'histoire de quasimodo');
        $book->setIsbn('TR789');
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_VICTOR));

        $manager->persist($book);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class
           
        ];
    }
}
