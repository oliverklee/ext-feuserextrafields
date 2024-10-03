<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup
 */
final class FrontendUserGroupTest extends UnitTestCase
{
    private FrontendUserGroup $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new FrontendUserGroup();
    }

    /**
     * @test
     */
    public function isAbstractEntity(): void
    {
        self::assertInstanceOf(AbstractEntity::class, $this->subject);
    }

    /**
     * @test
     */
    public function getCreationDateInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getCreationDate());
    }

    /**
     * @test
     */
    public function setCreationDateSetsCreationDate(): void
    {
        $date = new \DateTime();

        $this->subject->setCreationDate($date);

        self::assertSame($date, $this->subject->getCreationDate());
    }

    /**
     * @test
     */
    public function getModificationDateInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getModificationDate());
    }

    /**
     * @test
     */
    public function setModificationDateSetsModificationDate(): void
    {
        $date = new \DateTime();

        $this->subject->setModificationDate($date);

        self::assertSame($date, $this->subject->getModificationDate());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getTitle();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsGivenTitleProvidedInConstructor(): void
    {
        $title = 'foo bar';
        $subject = new FrontendUserGroup($title);

        $result = $subject->getTitle();

        self::assertSame($title, $result);
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $title = 'foo bar';

        $this->subject->setTitle($title);

        self::assertSame($title, $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getSubgroupInitiallyReturnsEmptyStorage(): void
    {
        $result = $this->subject->getSubgroup();

        self::assertInstanceOf(ObjectStorage::class, $result);
        self::assertCount(0, $result);
    }

    /**
     * @test
     */
    public function setSubgroupSetsUserGroups(): void
    {
        /** @var ObjectStorage<FrontendUserGroup> $groups */
        $groups = new ObjectStorage();
        $groups->attach(new FrontendUserGroup('foo'));

        $this->subject->setSubgroup($groups);

        self::assertSame($groups, $this->subject->getSubgroup());
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getDescription();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription(): void
    {
        $description = 'foo bar';

        $this->subject->setDescription($description);

        self::assertSame($description, $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function addSubgroupAddsUserGroup(): void
    {
        $group = new FrontendUserGroup('foo');

        $this->subject->addSubgroup($group);

        self::assertTrue($this->subject->getSubgroup()->contains($group));
    }

    /**
     * @test
     */
    public function removeSubgroupRemovesUserGroup(): void
    {
        $group = new FrontendUserGroup('foo');
        $this->subject->addSubgroup($group);
        self::assertTrue($this->subject->getSubgroup()->contains($group));

        $this->subject->removeSubgroup($group);

        self::assertFalse($this->subject->getSubgroup()->contains($group));
    }
}
