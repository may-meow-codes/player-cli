<?php

namespace MayMeowCodes\SoundPlayer\Console\Command;

use MayMeow\SocketClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PlayCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('mplayer:play')
            ->setDescription('Play a stream.')
            ->setHelp('This command allows you to play stream from URL...')
            
            ->addArgument('ipaddress', InputArgument::REQUIRED, 'Agent IP')

            ->addOption(
                'stream',
                's',
                InputOption::VALUE_REQUIRED,
                'Stream URL',
                null
            )

            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Playing stream from: ' . $input->getOption('stream') . ' on agent ' . $input->getArgument('ipaddress'));

        $client = new SocketClient('tcp://' . $input->getArgument('ipaddress') . ':9878');

        $response = $client->setAction('Play')
            ->setData(['url' => $input->getOption('stream') ])->run();

        $output->writeLn($response);
    }
}