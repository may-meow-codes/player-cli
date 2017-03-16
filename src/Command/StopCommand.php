<?php

namespace MayMeowCodes\SoundPlayer\Console\Command;

use MayMeow\SocketClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StopCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('mplayer:stop')
            ->setDescription('Stop playing a stream.')
            ->setHelp('This command allows you to stop playing stream from URL...')
            
            ->addArgument('ipaddress', InputArgument::REQUIRED, 'Agent IP')

            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeLn('Trying to stop stream on agent: ' . $input->getArgument('ipaddress'));


        $client = new SocketClient('tcp://' . $input->getArgument('ipaddress') . ':9878');

        $response = $client->setAction('Stop')->run();

        $output->writeLn($response);
    }
}