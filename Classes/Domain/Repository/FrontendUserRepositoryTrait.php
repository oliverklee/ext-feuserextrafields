<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @mixin Repository
 */
trait FrontendUserRepositoryTrait
{
    public function existsWithUsername(string $username): bool
    {
        if ($username === '') {
            return false;
        }

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->equals('username', $username));

        return $query->execute()->count() > 0;
    }
}
