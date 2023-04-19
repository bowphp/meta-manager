<?php

return [
    'engine' => 'tintin',
    'extension' => '.tintin.php',
    'cache' => sys_get_temp_dir() . '/cache',
    'path' => __DIR__ . '/../src/views',
    'additionnal_options' => [
        'auto_reload' => true
    ]
];
