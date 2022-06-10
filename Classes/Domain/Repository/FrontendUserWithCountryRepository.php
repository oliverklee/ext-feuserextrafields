<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<FrontendUserWithCountry>
 */
class FrontendUserWithCountryRepository extends Repository implements DirectPersistInterface
{
    use FrontendUserRepositoryTrait;
    use DirectPersistTrait;

    public function findOneByUsername(string $username): ?FrontendUserWithCountry
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
