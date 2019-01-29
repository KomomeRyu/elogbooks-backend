<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Job;
use AppBundle\Entity\User;

/**
 * Class LoadJobData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadJobData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $jobDescriptions = [
            'Clean desks on 2nd floor',
            'Monthly window cleaning',
            'Replace entrance doors',
            'Clean carpet in reception',
            'Replace boiler parts',
            'Move office equipment',
        ];

        foreach ($jobDescriptions as $jobDescription) {
            $job = new Job();
            $job->setDescription($jobDescription);
            $job->setUserid(0);

            $manager->persist($job);
        }

        $manager->flush();
    }
}

class LoadUserData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = [
           [
               'name' => 'Pepe',
               'email' => 'pepe@pepe.com',
           ],
           [
            'name' => 'Juan',
            'email' => 'juan@juan.com',
        ],
        ];

        foreach ($users as $userDetails) {
            $user = new User();
            $user->setName($userDetails['name']);
            $user->setEmail($userDetails['email']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}