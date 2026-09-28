<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // 1. Alice
        $alice = new User();
        $alice->setEmail('alice@example.fr');
        $alice->setPassword($this->hasher->hashPassword($alice, 'motdepasse'));
        $alice->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($alice);

        // 2. Bob
        $bob = new User();
        $bob->setEmail('bob@example.fr');
        $bob->setPassword($this->hasher->hashPassword($bob, 'motdepasse'));
        $bob->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($bob);

        // 3. Camille
        $camille = new User();
        $camille->setEmail('camille.aubert@example.fr');
        $camille->setFirstName('Camille');
        $camille->setLastName('Aubert');
        $camille->setPassword($this->hasher->hashPassword($camille, 'motdepasse'));
        $camille->setCreatedAt(new \DateTimeImmutable('2026-02-04'));
        $manager->persist($camille);

        $manager->flush();
    }
}
