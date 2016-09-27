<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function boot()
    {
        $this->container->get('filesystem')->mkdir(
            $this->container->getParameter('kernel.cache_dir').'/rulerz'
        );
    }
}
