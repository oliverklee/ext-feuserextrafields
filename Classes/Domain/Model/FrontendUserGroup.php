<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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

    public function __construct(string $title = '')
    {
        $this->setTitle($title);
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
}
