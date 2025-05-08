<?php

namespace App\Command;

use App\Entity\Tag;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:list-tags',
    description: 'Add a short description for your command',
)]
class ListTagsCommand extends Command
{
    
    /**
     * Plugs the database to the command
     *
     * @param ManagerRegistry $doctrineManager
     */
    public function __construct(ManagerRegistry $doctrineManager)
    {
        $this->todoRepository = $doctrineManager->getRepository(Tag::class);
        
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to list the tags')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // récupère une liste toutes les instances de la classe Tag
        $tags = $this->todoRepository->findAll();
        //dump($tags);
        if(!empty($tags)) {
            $io->title('list of tags:');
            $io->listing($tags);
        } else {
            $io->error('no tags found!');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
