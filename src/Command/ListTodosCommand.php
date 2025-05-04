<?php

namespace App\Command;
use App\Entity\Todo;
use App\Repository\TodoRepository;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Persistence\ManagerRegistry;

#[AsCommand(
    name: 'app:list-todos',
    description: 'Add a short description for your command',
)]
class ListTodosCommand extends Command
{
    private $todoRepository;

    public function __construct(ManagerRegistry $doctrineManager)
    {
        $this->todoRepository = $doctrineManager->getRepository(Todo::class);

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to list the todos')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // fetches all instances of class Todo from the DB
        $todos = $this->todoRepository->findAll();
        //dump($todos);
        if(!empty($todos)) {
            $io->title('list of todos:');
            $io->listing($todos);
        } else {
            $io->error('no todos found!');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
