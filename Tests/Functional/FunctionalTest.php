<?php

namespace DMR\Bundle\DMRBundle\Tests\Functional;

use Symfony\Component\Filesystem\Filesystem;

/**
 * Functional tests.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    private $cacheDir;
    private $kernel;

    /**
     * SetUp
     */
    public function setUp()
    {
        $this->cacheDir = __DIR__.'/Resources/cache';
        if (file_exists($this->cacheDir)) {
            $filesystem = new Filesystem();
            $filesystem->remove($this->cacheDir);
        }

        mkdir($this->cacheDir, 0777, true);

        $this->kernel = new TestKernel('test', false);
        $this->kernel->boot();
    }

    /**
     * TearDown
     */
    public function tearDown()
    {
        if (file_exists($this->cacheDir)) {
            $filesystem = new Filesystem();
            $filesystem->remove($this->cacheDir);
        }
    }

    /**
     * @test
     * @functional
     */
    public function shouldRegisterTheReaderService()
    {
        $this->assertInstanceOf('DMR\Mapping\AgnosticReader', $this->kernel->getContainer()->get('dmr.reader'));
    }

    /**
     * @test
     * @functional
     */
    public function shouldRegisterDoctrineRegistry()
    {
        $container = $this->kernel->getContainer();
        $reader = $container->get('dmr.reader');
        $doctrine = $container->get('doctrine');

        $this->assertContains($doctrine, $reader->getRegistries());
    }

    /**
     * @test
     * @functional
     */
    public function shouldRegisterDoctrineMongoDbRegistry()
    {
        $container = $this->kernel->getContainer();
        $reader = $container->get('dmr.reader');
        $doctrine = $container->get('doctrine_mongodb');

        $this->assertContains($doctrine, $reader->getRegistries());
    }
}
