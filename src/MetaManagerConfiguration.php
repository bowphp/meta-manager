<?php

namespace Bow\MetaManager;

use Bow\View\View;
use Tintin\Tintin;
use Bow\Configuration\Configuration;
use Bow\Configuration\Loader as ApplicationConfigurationLoader;

class MetaManagerConfiguration extends Configuration
{
    /**
     * @inheritDoc
     */
    public function create(ApplicationConfigurationLoader $config): void
    {
        $meta = (array) $config['meta'];

        $meta = array_merge(
            require __DIR__ . '/config/meta.php',
            $meta
        );

        $config['meta'] = $meta;
    }

    /**
     * @inheritDoc
     */
    public function run(): void
    {
        /**@var Tintin */
        $tintin = View::getInstance()->getEngine();

        if (!$tintin instanceof Tintin) {
            throw new MetaManagerException("Please use bowphp/tintin as the default view engine");
        }

        $tintin->directive('meta', function (array $attribute = []) use ($tintin) {
            return $tintin->renderString(file_get_contents(__DIR__ . '/views/meta.tintin.php'), $attribute);
        });
    }
}
