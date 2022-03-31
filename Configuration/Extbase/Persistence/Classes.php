<?php

declare(strict_types=1);

return [
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'lockToDomain' => ['fieldName' => 'lockToDomain'],
        ],
    ],
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
        'properties' => [
            'lockToDomain' => ['fieldName' => 'lockToDomain'],
        ],
    ],
];
