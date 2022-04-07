<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Model for a front-end user group.
 */
class FrontendUserGroup extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $lockToDomain = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup>
     */
    protected $subgroup;

    public function __construct(string $title = '')
    {
        $this->setTitle($title);
        $this->initializeObject();
    }

    /**
     * Properly initializes all associations (as fetching an entity from the DB does not use the constructor).
     */
    public function initializeObject(): void
    {
        $this->subgroup = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLockToDomain(): string
    {
        return $this->lockToDomain;
    }

    public function setLockToDomain(string $lockToDomain): void
    {
        $this->lockToDomain = $lockToDomain;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns the subgroups. Keep in mind that the property is called "subgroup"
     * although it can hold several user groups.
     *
     * @return ObjectStorage<FrontendUserGroup>
     */
    public function getSubgroup(): ObjectStorage
    {
        return $this->subgroup;
    }

    /**
     * Sets the subgroups. Keep in mind that the property is called "subgroup"
     * although it can hold several user groups.
     *
     * @param ObjectStorage<FrontendUserGroup> $groups
     */
    public function setSubgroup(ObjectStorage $groups): void
    {
        $this->subgroup = $groups;
    }

    public function addSubgroup(FrontendUserGroup $group): void
    {
        $this->subgroup->attach($group);
    }

    public function removeSubgroup(FrontendUserGroup $group): void
    {
        $this->subgroup->detach($group);
    }
}
