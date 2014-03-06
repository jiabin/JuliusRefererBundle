# Documentation

## Requirements

This bundle currently depends on:

* [Doctrine extensions](https://github.com/stof/StofDoctrineExtensionsBundle)

## Installation

### Step 1: Download JuliusRefererBundle using composer

Add JuliusRefererBundle in your composer.json:
```
{
    "require": {
        "jiabin/julius-referer-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:
```
$ php composer.phar update jiabin/julius-referer-bundle
```
Composer will install the bundle to your project's vendor/jiabin directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:
```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Julius\RefererBundle\JuliusRefererBundle(),
    );
}
```

### Step 3: Configure the JuliusRefererBundle

Now that you have properly installed and enabled JuliusRefererBundle, the next step is to configure the bundle to work with the specific needs of your application.

Add the following configuration to your config.yml file
```
# app/config/config.yml
julius_referer:
    db_driver: mongodb
    doctrine_listener: false
    field: ref
```

## Usage

Once installed and configured, bundle will start collecting referer data. To get the referer for current session use `RefererManager`:

```
$manager = $this->get('julius_referer.referer_manager');
$referers = $manager->getCurrent(); // Will return an array of RefererInterface objects
```

## SonataAdmin  support

This bundle supports [SonataAdminBundle](http://sonata-project.org/bundles/admin/master/doc/index.html). It will detect automatically sonata admin bundle and add a new item in your side menu. You can override this admin class by changing the value of `julius_referer.referer_admin.class` parameter in your configuration.

Here is an example:
```
# app/config/config.yml
...
# Parameters
parameters:
    julius_referer.referer_admin.class: Acme\DemoBundle\Admin\RefererAdmin
```

## AdmingeneratorGeneratorBundle support

This bundle supports [AdmingeneratorGeneratorBundle](http://symfony2admingenerator.org/). See generator file for more information:
```
Resources/config/AdminReferer-generator.yml
```