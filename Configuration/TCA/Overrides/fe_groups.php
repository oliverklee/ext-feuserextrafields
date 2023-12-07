<?php

defined('TYPO3') || die();

call_user_func(static function (): void {
    $temporaryColumns = [
        'crdate' => [
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'format' => 'datetime',
                'eval' => 'int',
                'readOnly' => true,
            ],
        ],
        'tstamp' => [
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'format' => 'datetime',
                'eval' => 'int',
                'readOnly' => true,
            ],
        ],
    ];

    $typo3Version = new \TYPO3\CMS\Core\Information\Typo3Version();
    if ($typo3Version->getMajorVersion() < 12) {
        $temporaryColumns = array_replace_recursive(
            $temporaryColumns,
            [
                'crdate' => [
                    'config' => [
                        'renderType' => 'inputDateTime',
                        'eval' => 'datetime,int',
                    ],
                ],
                'tstamp' => [
                    'config' => [
                        'renderType' => 'inputDateTime',
                        'eval' => 'datetime,int',
                    ],
                ],
            ]
        );
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $temporaryColumns);
});
