<?php

namespace DMR\Bundle\DMRBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Compiler pass that registers the Doctrine registries
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class RegisterDoctrineManagerRegistriesPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('dmr.reader')) {
            return;
        }

        $definition = $container->getDefinition('dmr.reader');
        $registries = array('doctrine', 'doctrine_mongodb');

        foreach ($registries as $registryId) {
            if ($container->hasDefinition($registryId)) {
                $definition->addMethodCall('addManagerRegistry', array(new Reference($registryId)));
            }
        }
    }
}
