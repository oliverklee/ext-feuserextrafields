<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Repository;

/**
 * Interface that adds a persistAll method to a repository. The idea is that users of this repository should not need to
 * care about the persistence manager.
 *
 * The corresponding trait is the default implementation.
 */
interface DirectPersistInterface
{
    /**
     * Persists all added or updated models.
     */
    public function persistAll(): void;
}
