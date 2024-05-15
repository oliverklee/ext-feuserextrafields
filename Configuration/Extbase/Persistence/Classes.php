<?php

declare(strict_types=1);

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;

return [
    FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'creationDate' => ['fieldName' => 'crdate'],
            'modificationDate' => ['fieldName' => 'tstamp'],
            'userGroup' => ['fieldName' => 'usergroup'],
            'lastLogin' => ['fieldName' => 'lastlogin'],
        ],
    ],
    FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
        'properties' => [
            'creationDate' => ['fieldName' => 'crdate'],
            'modificationDate' => ['fieldName' => 'tstamp'],
        ],
    ],
];
