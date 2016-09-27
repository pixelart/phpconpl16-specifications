<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use AppBundle\Spec\AwesomeUnicorn;
use AppBundle\Spec\Fluffy;
use AppBundle\Spec\LaserHorn;
use RulerZ\Spec\AndX;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step06Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $qb = $this->getContainer()->get('doctrine')
            ->getRepository('AppBundle:Unicorn')
            ->createQueryBuilder('u');

        $spec = new AndX([
            new AwesomeUnicorn(),
            new LaserHorn(),
            (new Fluffy())->not(),
        ]);

        $rulerz = $this->getRulerZ();
        $fuckingAwesomeUnicorns = $rulerz->filterSpec($qb, $spec);

        // output
        $table = new Table($output);
        $table->setHeaders(['ID', 'Name', 'Color', 'Birth date', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?']);

        /** @var Unicorn $fuckingAwesomeUnicorn */
        foreach ($fuckingAwesomeUnicorns as $fuckingAwesomeUnicorn) {
            $table->addRow($fuckingAwesomeUnicorn->toArray2());
        }

        $table->render();
    }
}
