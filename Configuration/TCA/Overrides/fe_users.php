<?php

defined('TYPO3') || die();

call_user_func(static function (): void {
    $languageFile = 'LLL:EXT:feuserextrafields/Resources/Private/Language/locallang.xlf:';

    $temporaryColumns = [
        'crdate' => [
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'format' => 'datetime',
                'eval' => 'datetime,int',
                'readOnly' => true,
            ],
        ],
        'tstamp' => [
            'config' => [
                'type' => 'input',
                'format' => 'datetime',
                'renderType' => 'datetime',
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
                        'label' => $languageFile . 'gender.99',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_NOT_PROVIDED,
                    ],
                    [
                        'label' => $languageFile . 'gender.0',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_MALE,
                    ],
                    [
                        'label' => $languageFile . 'gender.1',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_FEMALE,
                    ],
                    [
                        'label' => $languageFile . 'gender.2',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_DIVERSE,
                    ],
                ],
                'default' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::GENDER_NOT_PROVIDED,
            ],
        ],
        'date_of_birth' => [
            'label' => $languageFile . 'dateOfBirth',
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'format' => 'date',
                'size' => 10,
                'eval' => 'int',
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
        'terms_acknowledged' => [
            'exclude' => true,
            'label' => $languageFile . 'terms_acknowledged',
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
                        'label' => $languageFile . 'status.0',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_NONE,
                    ],
                    [
                        'label' => $languageFile . 'status.1',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_STUDENT,
                    ],
                    [
                        'label' => $languageFile . 'status.2',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_JOB_SEEKING_FULL_TIME,
                    ],
                    [
                        'label' => $languageFile . 'status.3',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_WORKING,
                    ],
                    [
                        'label' => $languageFile . 'status.4',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_RETIRED,
                    ],
                    [
                        'label' => $languageFile . 'status.5',
                        'value' => \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::STATUS_JOB_SEEKING_PART_TIME,
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

    $typo3Version = new \TYPO3\CMS\Core\Information\Typo3Version();
    if ($typo3Version->getMajorVersion() < 12) {
        unset($temporaryColumns['gender']['config']['items'], $temporaryColumns['status']['config']['items']);
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
                'date_of_birth' => [
                    'config' => [
                        'renderType' => 'inputDateTime',
                        'eval' => 'datetime,int',
                    ],
                ],
                'gender' => [
                    'config' => [
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
                    ],
                ],
                'status' => [
                    'config' => [
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
                    ],
                ],
            ]
        );
    }

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
        'privacy, terms_acknowledged, comments'
    );
});
