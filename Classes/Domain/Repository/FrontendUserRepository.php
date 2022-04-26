<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<FrontendUser>
 */
class FrontendUserRepository extends Repository
{
    use FrontendUserRepositoryTrait;

    public function findOneByUsername(string $username): ?FrontendUser
    {
        if ($username === '') {
            return null;
        }

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->equals('username', $username));

        return $query->execute()->getFirst();
    }
}
