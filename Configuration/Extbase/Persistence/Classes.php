<?php

declare(strict_types=1);

return [
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'creationDate' => ['fieldName' => 'crdate'],
            'modificationDate' => ['fieldName' => 'tstamp'],
            'userGroup' => ['fieldName' => 'usergroup'],
            'lastLogin' => ['fieldName' => 'lastlogin'],
        ],
    ],
    OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
        'properties' => [
            'creationDate' => ['fieldName' => 'crdate'],
            'modificationDate' => ['fieldName' => 'tstamp'],
        ],
    ],
];
