<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Todo;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadTodos($manager);
    }

    private function loadTodos(ObjectManager $manager)
    {
        foreach ($this->getTodosData() as [$title, $completed]) {
            $todo = new Todo();
            $todo->setTitle($title);
            $todo->setCompleted($completed);
            $manager->persist($todo);
        }
        $manager->flush();
    }
    
    private function getTodosData()
    {
        // todo = [title, completed];
        yield ['apprendre les bases de PHP', true];
        yield ['devenir un pro du Web', false];
        yield ['monter une startup',  false];
        yield ['devenir maître du monde', false];
        
    }
    

}
