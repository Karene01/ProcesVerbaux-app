<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadTodos($manager);
        $this->loadTags($manager);
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
    
    private function loadTags(ObjectManager $manager)
    {
        foreach ($this->getTagsData() as [$name]) {
            $todo = new Tag();
            $todo->setName($name);
            $manager->persist($todo);
        }
        $manager->flush();
    }
    
    private function getTagsData()
    {
        // tag = [name];
        yield ['important'];
        yield ['facile'];
        yield ['urgent'];
        yield ['seum'];
    }
    
    
}