<?php

namespace App\Command;

use App\Entity\Tag;
use App\Entity\Todo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:add-tag',
    description: 'Add a tag to a todo (both must exist already)',
)]
class AddTagCommand extends Command
{
    /**
     *  @var ManagerRegistry data access repository
     */
    private $doctrineManager;
    
    /**
     * Plugs the database to the command
     *
     * @param ManagerRegistry $doctrineManager
     */
    public function __construct(ManagerRegistry $doctrineManager)
    {
        $this->doctrineManager = $doctrineManager;
        
        parent::__construct();
    }
    
    protected function configure(): void
    {
        $this
            ->addArgument('tagName', InputArgument::REQUIRED, 'Tag name')
            ->addArgument('todoId', InputArgument::REQUIRED, 'Id of the todo')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $tagName = $input->getArgument('tagName');
        $todoId = $input->getArgument('todoId');
        
        dump($tagName);
        dump($todoId);
        
        // Do the work here :
        // DONE 1. load tag and todo
        $tagRepository = $this->doctrineManager->getRepository(Tag::class);
        $todoRepository = $this->doctrineManager->getRepository(Todo::class);
        
        $tag = $tagRepository->findOneBy(['name' => $tagName]);
        if(! $tag){
            $io->error('could not find tag!');
            return Command::FAILURE;
        }
        
        $todo = $todoRepository->find($todoId);
        if(! $todo){
            $io->error('could not find todo!');
            return Command::FAILURE;
        }
        dump($todo);
        dump($tag);
        
        // DONE 2. add tag to todo
        $todo->addTag($tag);
        dump($todo);
        dump($tag);
        
        // DONE 3. save changes to the database
        $todoRepository->save($todo, true);
        
        return Command::SUCCESS;
    }
}
