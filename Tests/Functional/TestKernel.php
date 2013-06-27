<?php

namespace DMR\Bundle\DMRBundle\Tests\Functional;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Test kernel.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class TestKernel extends Kernel
{
    /**
     * {@inheritDoc}
     */
    public function getRootDir()
    {
        return __DIR__.'/Resources';
    }

    /**
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        return array(
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new \DMR\Bundle\DMRBundle\DMRBundle(),
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function getContainerBuilder()
    {
        $container = parent::getContainerBuilder();
        $container->register('annotation_reader', 'Doctrine\Common\Annotations\AnnotationReader');

        return $container;
    }

    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/Resources/config/config_'.$this->getEnvironment().'.yml');
    }
}
