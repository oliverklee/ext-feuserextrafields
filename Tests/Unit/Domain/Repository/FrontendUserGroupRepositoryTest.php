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
    private FrontendUserGroupRepository $subject;

    protected function setUp(): void
    {
        parent::setUp();

        if (\interface_exists(ObjectManagerInterface::class)) {
            $objectManagerStub = $this->createStub(ObjectManagerInterface::class);
            // @phpstan-ignore arguments.count (This line is 11LTS-specific, but we're running PHPStan on TYPO3 12.)
            $this->subject = new FrontendUserGroupRepository($objectManagerStub);
        } else {
            $this->subject = new FrontendUserGroupRepository();
        }
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
