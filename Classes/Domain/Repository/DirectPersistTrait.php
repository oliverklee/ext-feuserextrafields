<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Trait that adds a persistAll method to a repository. The idea is that users of this repository should not need to
 * care about the persistence manager.
 *
 * This is the default implementation of the corresponding interface.
 *
 * @phpstan-require-extends Repository
 * @phpstan-require-implements DirectPersistInterface
 *
 * @internal
 */
trait DirectPersistTrait
{
    /**
     * Persists all added or updated models.
     */
    public function persistAll(): void
    {
        $this->persistenceManager->persistAll();
    }
}
