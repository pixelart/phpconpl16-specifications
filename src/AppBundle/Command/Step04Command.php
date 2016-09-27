<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use AppBundle\Spec\AwesomeUnicorn;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step04Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $unicorns = [
            new Unicorn('Klaus', 'white', false, true, true, false),
            new Unicorn('Michael', 'blue', true, false, false, false),
            new Unicorn('Sandy', 'pink', false, true, true, true),
            new Unicorn('Mandy', 'pink', false, true, false, true),
        ];

        $spec = new AwesomeUnicorn();

        $rulerz = $this->getRulerZ();
        $awesomeUnicorns = $rulerz->filterSpec($unicorns, $spec);

        // output
        $table = new Table($output);
        $table->setHeaders(['Name', 'Color', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?']);

        /** @var Unicorn $awesomeUnicorn */
        foreach ($awesomeUnicorns as $awesomeUnicorn) {
            $table->addRow($awesomeUnicorn->toArray());
        }

        $table->render();

        $isAwesome = $rulerz->satisfiesSpec($unicorns[3], $spec);
        var_dump($isAwesome);
    }
}
