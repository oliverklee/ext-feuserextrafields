<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\DirectPersistTrait
 */
final class FrontendUserGroupRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    /**
     * @var FrontendUserGroupRepository
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->get(FrontendUserGroupRepository::class);
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
        self::assertEquals(new \DateTime('2019-01-01 00:00:00'), $model->getCreationDate());
        self::assertEquals(new \DateTime('2023-01-01 00:00:00'), $model->getModificationDate());
        self::assertSame('editors', $model->getTitle());
        self::assertSame('We build websites!', $model->getDescription());
    }

    /**
     * @test
     */
    public function findByUidsWithoutMatchesReturnsEmptyArray(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        $models = $this->subject->findByUids([2]);

        self::assertCount(0, $models);
    }

    /**
     * @test
     */
    public function findByUidsForExistingRecordReturnsMatchingModel(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        $models = $this->subject->findByUids([1]);

        self::assertCount(1, $models);
        $firstModel = $models->current();
        self::assertInstanceOf(FrontendUserGroup::class, $firstModel);
        self::assertSame(1, $firstModel->getUid());
    }

    /**
     * @test
     */
    public function findByUidsFindsRecordsOnAnyPage(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupOnPage.xml');

        $models = $this->subject->findByUids([1]);

        self::assertCount(1, $models);
        $firstModel = $models->current();
        self::assertInstanceOf(FrontendUserGroup::class, $firstModel);
        self::assertSame(1, $firstModel->getUid());
    }

    /**
     * @test
     */
    public function findByUidsSilentlyIgnoresNonStringUids(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        // @phpstan-ignore-next-line We are explicitly testing with a contract-violating value.
        $models = $this->subject->findByUids([1, '\'"--ab']);

        self::assertCount(1, $models);
        $firstModel = $models->current();
        self::assertInstanceOf(FrontendUserGroup::class, $firstModel);
        self::assertSame(1, $firstModel->getUid());
    }

    /**
     * @test
     */
    public function findByUidsForForPartialMatchesReturnsOnlyTheMatches(): void
    {
        $this->importDataSet(__DIR__ . '/Fixtures/UserGroupWithAllScalarData.xml');

        $models = $this->subject->findByUids([1, 2]);

        self::assertCount(1, $models);
        $firstModel = $models->current();
        self::assertInstanceOf(FrontendUserGroup::class, $firstModel);
        self::assertSame(1, $firstModel->getUid());
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
