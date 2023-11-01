<?php

defined('TYPO3') || die();

call_user_func(static function (): void {
    $temporaryColumns = [
        'crdate' => [
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'readOnly' => true,
            ],
        ],
        'tstamp' => [
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'readOnly' => true,
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $temporaryColumns);
});
