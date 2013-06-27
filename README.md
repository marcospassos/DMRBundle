Doctrine Mapping Reader Bundle
==============================
Provides a Doctrine Mapping Reader integration for your Symfony projects.

About DMR
---------

PHP 5.3+ library that provides a simple and flexible way to load custom mapping data for Doctrine 2.3+ projects.

It supports Yaml, Xml and Annotation drivers which will be chosen depending on currently used mapping driver for your domain objects.

Documentation is available the [official page of DMR][dmr-homepage].

Installation
------------

## Prerequisites

As this bundle is an integration for Symfony of the [DMR](dmr-homepage) library, it requires you to first install [DMR](dmr-homepage) in a Symfony project.

## Download the bundle

You can download an archive of the bundle and unpack it in the `vendor/bundles/DMR/Bundle/DMRBundle` directory of your application.

### Composer Style

This bundle can be installed using composer by adding the following in the `require` section of your `composer.json` file:

```
    "require": {
        ...
        "dmr/dmr-bundle": "0.1.*-dev"
    },
```
## Register the bundle

You must register the bundle in your kernel:

``` php
<?php

// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(

        // ...

        new DMR\Bundle\DMRBundle\DMRBundle()
    );

    // ...
}
```

## Usage
Reading metadata is pretty simple:

```php
$data = $container->get('dmr.reader')->read('Acme\Entity\User', 'Acme\Doctrine\ExtensionNamespace');
$data = $container->get('dmr.reader')->read('Acme\Document\User', 'Acme\Doctrine\ExtensionNamespace');

// Alternatively
$data = $container->get('dmr.reader')->read($object, 'Acme\Doctrine\ExtensionNamespace');
```

For more details, you can check out the [official page of DMR](dmr-homepage).

## Feedback

**Please provide feedback!** We want to make this library useful in as many projects as possible. Please raise a Github issue, and point out what you do and don't like, or fork the project and make suggestions. **No issue is too small.**



