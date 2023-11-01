<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Adds the creation date to a model.
 *
 * @mixin AbstractEntity
 *
 * @internal
 */
trait CreationDateTrait
{
    /**
     * @var \DateTime|null
     */
    protected $creationDate;

    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }
}
