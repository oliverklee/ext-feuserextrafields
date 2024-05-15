<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Extra fields for TYPO3 frontend users',
    'description' => 'Extra fields for TYPO3 frontend users and drop-in replacement for the removed FrontEndUser Core model',
    'version' => '6.2.1',
    'category' => 'misc',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.3.99',
            'typo3' => '11.5.17-12.4.99',
            'extbase' => '11.5.17-12.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'state' => 'stable',
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
