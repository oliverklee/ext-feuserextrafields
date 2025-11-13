<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<FrontendUser>
 */
class FrontendUserRepository extends Repository implements DirectPersistInterface
{
    use DirectPersistTrait;

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

    /**
     * Searches in UID, username, full name, first name, last name, email, company. All search results are
     * substring matches, except for the UID, which is an exact match.
     *
     * @return QueryResultInterface<FrontendUser>
     */
    public function findBySearchTermInBackendMode(string $searchTerm): QueryResultInterface
    {
        $query = $this->createQuery();
        $query
            ->getQuerySettings()
            ->setRespectStoragePage(false)
            ->setIgnoreEnableFields(true);

        $escapedSearchTerm = \addcslashes($searchTerm, '_%');
        $query->matching(
            $query->logicalOr(
                $query->equals('uid', $searchTerm),
                $query->like('username', '%' . $escapedSearchTerm . '%'),
                $query->like('name', '%' . $escapedSearchTerm . '%'),
                $query->like('firstName', '%' . $escapedSearchTerm . '%'),
                $query->like('lastName', '%' . $escapedSearchTerm . '%'),
                $query->like('email', '%' . $escapedSearchTerm . '%'),
                $query->like('company', '%' . $escapedSearchTerm . '%'),
            ),
        );

        return $query->execute();
    }
}
