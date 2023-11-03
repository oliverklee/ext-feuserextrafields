<?php

defined('TYPO3') || die();

call_user_func(static function (): void {
    $languageFile = 'LLL:EXT:feuserextrafields/Resources/Private/Language/locallang.xlf:';

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
        'full_salutation' => [
            'exclude' => 0,
            'label' => $languageFile . 'full_salutation',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'max' => '255',
                'eval' => '',
                'default' => '',
            ],
        ],
        'gender' => [
            'label' => $languageFile . 'gender',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        $languageFile . 'gender.99',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_NOT_PROVIDED,
                    ],
                    [
                        $languageFile . 'gender.0',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_MALE,
                    ],
                    [
                        $languageFile . 'gender.1',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_FEMALE,
                    ],
                    [
                        $languageFile . 'gender.2',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_DIVERSE,
                    ],
                ],
                'default' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_NOT_PROVIDED,
            ],
        ],
        'date_of_birth' => [
            'label' => $languageFile . 'dateOfBirth',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'date,int',
                'default' => 0,
            ],
        ],
        'zone' => [
            'label' => $languageFile . 'zone',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 40,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'privacy' => [
            'exclude' => true,
            'label' => $languageFile . 'privacy',
            'config' => [
                'type' => 'check',
            ],
        ],
        'status' => [
            'label' => $languageFile . 'status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        $languageFile . 'status.0',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_NONE,
                    ],
                    [
                        $languageFile . 'status.1',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_STUDENT,
                    ],
                    [
                        $languageFile . 'status.2',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_JOB_SEEKING_FULL_TIME,
                    ],
                    [
                        $languageFile . 'status.3',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_WORKING,
                    ],
                    [
                        $languageFile . 'status.4',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_RETIRED,
                    ],
                    [
                        $languageFile . 'status.5',
                        \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_JOB_SEEKING_PART_TIME,
                    ],
                ],
                'default' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_NONE,
            ],
        ],
        'comments' => [
            'label' => $languageFile . 'comments',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 48,
                'default' => '',
                'eval' => 'trim',
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $temporaryColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        'full_salutation, gender',
        '',
        'before:name'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        'date_of_birth, status',
        '',
        'after:name'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        'zone',
        '',
        'after:city'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        'privacy, comments'
    );
});
