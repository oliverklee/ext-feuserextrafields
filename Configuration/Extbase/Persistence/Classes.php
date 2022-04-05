<?php

declare(strict_types=1);

return [
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'userGroup' => ['fieldName' => 'usergroup'],
            'lockToDomain' => ['fieldName' => 'lockToDomain'],
            'lastLogin' => ['fieldName' => 'lastlogin'],
        ],
    ],
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
        'properties' => [
            'lockToDomain' => ['fieldName' => 'lockToDomain'],
        ],
    ],
];
