<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\DirectPersistTrait
 */
final class FrontendUserGroupRepositoryTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    /**
     * @var FrontendUserGroupRepository
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        if (GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion() >= 11) {
            $this->subject = $this->get(FrontendUserGroupRepository::class);
        } else {
            $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
            $this->subject = $objectManager->get(FrontendUserGroupRepository::class);
        }
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

    /**
     * @test
     */
    public function persistAllPersistsAddedModels(): void
    {
        $group = new FrontendUserGroup();

        $this->subject->add($group);
        $this->subject->persistAll();

        $connection = $this->getConnectionPool()->getConnectionForTable('fe_users');
        $databaseRow = $connection
            ->executeQuery('SELECT * FROM fe_groups WHERE uid = :uid', ['uid' => $group->getUid()])
            ->fetchAssociative();

        self::assertIsArray($databaseRow);
    }
}
