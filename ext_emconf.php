<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CC Image',
    'description' => 'Provide image viewhelpers and support for WebP',
    'category' => 'plugin',
    'author' => 'Coeln Concept GmbH',
    'author_email' => 'info@coelnconcept.de',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
