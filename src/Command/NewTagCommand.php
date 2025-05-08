<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\Persistence\ManagerRegistry;

#[AsCommand(
    name: 'app:new-tag',
    description: 'Creates a new tag',
)]
class NewTagCommand extends Command
{
    /**
     *  @var TagRepository data access repository
     */
    private $tagRepository;
    
    /**
     * Plugs the database to the command
     *
     * @param ManagerRegistry $doctrineManager
     */
    public function __construct(ManagerRegistry $doctrineManager)
    {
        $this->tagRepository = $doctrineManager->getRepository(Tag::class);
        
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'Argument name')
            ->setHelp('This command allows you to create a new tag')
        ;
    }

  
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $tag = new Tag();
        $tag->setName($input->getArgument('name'));
        
        $this->tagRepository->save($tag, true);
        
        if($tag->getId()) {
            $io->success('Created: '. $tag);
            return Command::SUCCESS;
        }
        else {
            $io->error('could not create tag!');
            return Command::FAILURE;
        }
    }
}
