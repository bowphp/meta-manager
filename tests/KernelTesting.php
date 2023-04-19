<?php

namespace Test;

use Bow\Configuration\Loader as ConfigurationLoader;
use Bow\MetaManager\MetaManagerConfiguration;
use Bow\View\ViewConfiguration;

class KernelTesting extends ConfigurationLoader
{
    public function configurations(): array
    {
        return [
            ViewConfiguration::class,
            MetaManagerConfiguration::class,
        ];
    }
}
