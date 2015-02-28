<?php

use Sylius\Bundle\CoreBundle\Kernel\Kernel;

class AppKernel extends Kernel
{
    protected $projectName = 'sylius-standard/custom';

    public function registerBundles()
    {
        $bundles = array(
            // Your bundles here!
        );

        if (in_array($this->environment, array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return array_merge(parent::registerBundles(), $bundles);
    }

    public function getCacheDir()
    {
        if (!empty($_SERVER['SYMFONY_USE_SHM']) && in_array($this->environment, array(
                'dev',
                'test'
            ))
        ) {
            return '/dev/shm/' . $this->projectName . '/cache/' . $this->environment;
        }

        return parent::getCacheDir();
    }

    public function getLogDir()
    {
        if (!empty($_SERVER['SYMFONY_USE_SHM']) && in_array($this->environment, array(
                'dev',
                'test'
            ))
        ) {
            return '/dev/shm/' . $this->projectName . '/logs';
        }

        return parent::getLogDir();
    }
}
