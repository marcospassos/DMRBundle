<?php

namespace DMR\Bundle\DMRBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use DMR\Bundle\DMRBundle\DependencyInjection\Compiler\RegisterDoctrineManagerRegistriesPass;

/**
 * The DMR Bundle
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class DMRBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterDoctrineManagerRegistriesPass());
    }
}
