<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<FrontendUserGroup>
 */
class FrontendUserGroupRepository extends Repository implements DirectPersistInterface
{
    use DirectPersistTrait;
}
