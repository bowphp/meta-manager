<?php

namespace Bow\MetaManager;

use Bow\View\View;
use Tintin\Tintin;
use Bow\Configuration\Configuration;
use Bow\Configuration\Loader as Config;

class MetaManagerConfiguration extends Configuration
{
    /**
     * @inheritDoc
     */
    public function create(Config $config): void
    {
        $meta = (array) $config['meta'];

        $meta = array_merge(
            require __DIR__ . '/config/meta.php',
            $meta
        );

        $config['meta'] = $meta;

        /**@var Tintin */
        $template = View::getInstance()->getTemplate();

        $template->directive('meta', function(array $attribute) use ($tempate) {
            return $tempate->renderString(file_get_contents(__DIR__.'/views/meta.tintin.php'), $attribute);
        });
    }

    /**
     * @inheritDoc
     */
    public function run(): void
    {
        //
    }
}
