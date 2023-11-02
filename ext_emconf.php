<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Extra fields for TYPO3 frontend users',
    'description' => 'Extra fields for TYPO3 frontend users and drop-in replacement for the removed FrontEndUser Core model',
    'version' => '5.4.0',
    'category' => 'misc',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-8.3.99',
            'typo3' => '10.4.11-11.5.99',
            'extbase' => '10.4.11-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
            'static_info_tables' => '6.9.0-11.5.99',
        ],
    ],
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Oliver Klee',
    'author_email' => 'typo3-coding@oliverklee.de',
    'author_company' => 'oliverklee.de',
    'autoload' => [
        'psr-4' => [
            'OliverKlee\\FeUserExtraFields\\' => 'Classes/',
        ],
    ],
    'autoload-dev' => [
        'psr-4' => [
            'OliverKlee\\FeUserExtraFields\\Tests\\' => 'Tests/',
        ],
    ],
];
