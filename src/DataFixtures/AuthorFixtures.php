<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public const AUTHOR_VICTOR = 'AUTHOR_BOB';

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 50; $i++) {

            $author = new Author();
            $author->setFirstName('Author' . $i);
            $author->setLastName('LastName' . $i);
            $this->setReference(self::AUTHOR_VICTOR, $author);

            $manager->persist($author);
        }
        $manager->flush();
    }
}