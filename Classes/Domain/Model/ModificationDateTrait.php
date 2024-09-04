<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Adds the modification date to a model.
 *
 * @phpstan-require-extends AbstractEntity
 *
 * @internal
 */
trait ModificationDateTrait
{
    protected ?\DateTime $modificationDate = null;

    public function getModificationDate(): ?\DateTime
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTime $modificationDate): void
    {
        $this->modificationDate = $modificationDate;
    }
}
