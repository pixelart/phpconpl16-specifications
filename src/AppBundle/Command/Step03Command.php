<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step03Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $unicorns = [
            new Unicorn('Klaus', 'white', false, true, true, false),
            new Unicorn('Michael', 'blue', true, false, false, false),
            new Unicorn('Sandy', 'pink', false, true, true, true),
            new Unicorn('Mandy', 'pink', false, true, false, true),
        ];

        $rule = 'fluffy = true';

        $rulerz = $this->getRulerZ();
        $fluffyUnicorns = $rulerz->filter($unicorns, $rule);

        // output
        $table = new Table($output);
        $table->setHeaders(['Name', 'Color', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?']);

        /** @var Unicorn $fluffyUnicorn */
        foreach ($fluffyUnicorns as $fluffyUnicorn) {
            $table->addRow($fluffyUnicorn->toArray());
        }

        $table->render();

        $isFluffy = $rulerz->satisfies($unicorns[3], $rule);
        var_dump($isFluffy);
    }
}
