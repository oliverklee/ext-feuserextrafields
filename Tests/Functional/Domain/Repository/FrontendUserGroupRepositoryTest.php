<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository
 */
final class FrontendUserGroupRepositoryTest extends FunctionalTestCase
{
    /**
     * @var array<string>
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    /**
     * @var FrontendUserGroupRepository
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->subject = $objectManager->get(FrontendUserGroupRepository::class);
    }

    /**
     * @test
     */
    public function findAllForNoRecordsReturnsEmptyContainer(): void
    {
        $container = $this->subject->findAll();

        self::assertCount(0, $container);
    }

    /**
     * @test
     */
    public function findByUidForExistingRecordReturnsModelWithAllScalarData(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        $model = $this->subject->findByUid(1);

        self::assertInstanceOf(FrontendUserGroup::class, $model);
        self::assertSame('editors', $model->getTitle());
        self::assertSame('www.example.com', $model->getLockToDomain());
        self::assertSame('We build websites!', $model->getDescription());
    }

    /**
     * @test
     */
    public function initializesSubGroupsWithEmptyStorage(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        $model = $this->subject->findByUid(1);
        self::assertInstanceOf(FrontendUserGroup::class, $model);

        $groups = $model->getSubgroup();
        self::assertInstanceOf(ObjectStorage::class, $groups);
        self::assertCount(0, $groups);
    }

    /**
     * @test
     */
    public function mapsSubgroupAssociation(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithTwoSubgroups.xml');

        $model = $this->subject->findByUid(1);
        self::assertInstanceOf(FrontendUserGroup::class, $model);

        $groups = $model->getSubgroup();
        self::assertInstanceOf(ObjectStorage::class, $groups);
        self::assertCount(2, $groups);
        $groupsAsArray = $groups->toArray();
        self::assertInstanceOf(FrontendUserGroup::class, $groupsAsArray[0]);
        self::assertInstanceOf(FrontendUserGroup::class, $groupsAsArray[1]);
    }
}
