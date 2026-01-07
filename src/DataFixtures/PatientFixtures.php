<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $patients = [
            ['Dupont', 'Jean', '0123456789', 'jean.dupont@email.com', 'password123'],
            ['Martin', 'Sophie', '0234567891', 'sophie.martin@email.com', 'password456'],
            ['Leroy', 'Pierre', '0345678912', 'pierre.leroy@email.com', 'password789'],
            ['Petit', 'Marie', '0456789123', 'marie.petit@email.com', 'password101'],
            ['Moreau', 'Paul', '0567891234', 'paul.moreau@email.com', 'password112'],
        ];

        foreach ($patients as $patientData) {
            $patient = new Patient();
            $patient->setNom($patientData[0]);
            $patient->setPrenom($patientData[1]);
            $patient->setTel($patientData[2]);
            $patient->setLogin($patientData[3]);
            $patient->setPassword(password_hash($patientData[4], PASSWORD_DEFAULT));

            $manager->persist($patient);
        }

        $manager->flush();
    }
}
