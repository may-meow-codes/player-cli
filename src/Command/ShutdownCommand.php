<?php

namespace MayMeowCodes\SoundPlayer\Console\Command;

use MayMeow\SocketClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShutdownCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('mplayer:shutdown')
            ->setDescription('Shutdown agent')
            ->setHelp('This command allows you to shutdown agent...')
            
            ->addArgument('ipaddress', InputArgument::REQUIRED, 'Agent IP')

            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeLn('Trying to stop stream on agent: ' . $input->getArgument('ipaddress'));


        $client = new SocketClient('tcp://' . $input->getArgument('ipaddress') . ':9878');

        $response = $client->setAction('Shutdown')->run();

        $output->writeLn($response);
    }
}