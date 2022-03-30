<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository
 */
final class FrontendUserGroupRepositoryTest extends FunctionalTestCase
{
    /**
     * @var array<int, non-empty-string>
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
    }
}
