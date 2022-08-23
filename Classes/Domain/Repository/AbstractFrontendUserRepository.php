<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @template TEntityClass of \TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface
 * @extends Repository<TEntityClass>
 */
abstract class AbstractFrontendUserRepository extends Repository implements DirectPersistInterface
{
    use DirectPersistTrait;

    /**
     * @return TEntityClass|null
     */
    public function findOneByUsername(string $username)
    {
        if ($username === '') {
            return null;
        }

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->equals('username', $username));

        /** @var TEntityClass|null $result */
        $result = $query->execute()->getFirst();

        return $result;
    }

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
