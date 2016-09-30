<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use AppBundle\Repository\UnicornRepository;
use AppBundle\Spec\Baby;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step12Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        /** @var UnicornRepository $repository */
        $repository = $this->getContainer()->get('app.unicorn_repository');

        $spec = new Baby();
        $awesomeUnicorns = $repository->matchSpec($spec);

        // output
        $table = new Table($output);
        $table->setHeaders(['ID', 'Name', 'Color', 'Birth date', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?']);

        /** @var Unicorn $awesomeUnicorn */
        foreach ($awesomeUnicorns as $awesomeUnicorn) {
            $table->addRow($awesomeUnicorn->toArray2());
        }

        $table->render();
    }
}
