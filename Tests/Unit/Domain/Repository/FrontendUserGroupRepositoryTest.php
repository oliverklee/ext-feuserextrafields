<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Repository\DirectPersistInterface;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\RepositoryInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository
 */
final class FrontendUserGroupRepositoryTest extends UnitTestCase
{
    /**
     * @var FrontendUserGroupRepository
     *
     * We can make this property private once we drop support for TYPO3 V9.
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $objectManager = $this->prophesize(ObjectManagerInterface::class)->reveal();
        $this->subject = new FrontendUserGroupRepository($objectManager);
    }

    /**
     * @test
     */
    public function implementsRepositoryInterface(): void
    {
        self::assertInstanceOf(RepositoryInterface::class, $this->subject);
    }

    /**
     * @test
     */
    public function isRepository(): void
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }

    /**
     * @test
     */
    public function implementsDirectPersistInterface(): void
    {
        self::assertInstanceOf(DirectPersistInterface::class, $this->subject);
    }
}
