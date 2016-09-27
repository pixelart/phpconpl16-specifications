<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use AppBundle\Spec\Baby;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step08Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $babyUnicorn = new Unicorn('Elsie');
        $babyUnicorn->setBirthDate(new \DateTime('-1 year'));

        $teenageUnicorn = new Unicorn('Ryan');
        $teenageUnicorn->setBirthDate(new \DateTime('-16 year'));

        $unicorns = [$babyUnicorn, $teenageUnicorn];

        $spec = new Baby();

        $rulerz = $this->getRulerZ();
        $awesomeUnicorns = $rulerz->filterSpec($unicorns, $spec);

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
