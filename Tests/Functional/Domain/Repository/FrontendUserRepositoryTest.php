<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Repository;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserRepository
 */
final class FrontendUserRepositoryTest extends FunctionalTestCase
{
    /**
     * @var array<int, non-empty-string>
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    /**
     * @var FrontendUserRepository
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->subject = $objectManager->get(FrontendUserRepository::class);
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
        $this->importDataSet(__DIR__ . '/Fixtures/UserWithAllScalarData.xml');

        $uid = 1;
        $model = $this->subject->findByUid($uid);

        self::assertInstanceOf(FrontendUser::class, $model);
        self::assertSame('max', $model->getUsername());
        self::assertSame('luif3ui4t12', $model->getPassword());
        self::assertSame('Max M. Minimau', $model->getName());
        self::assertSame('Max', $model->getFirstName());
        self::assertSame('Murri', $model->getMiddleName());
        self::assertSame('Minimau', $model->getLastName());
        self::assertSame('Near the heating 4', $model->getAddress());
        self::assertSame('+49 1111 1233456-78', $model->getTelephone());
        self::assertSame('+49 1111 1233456-79', $model->getFax());
        self::assertSame('max@example.com', $model->getEmail());
        self::assertSame('example.com', $model->getLockToDomain());
        self::assertSame('Head of fur', $model->getTitle());
        self::assertSame('01234', $model->getZip());
        self::assertSame('Kattingen', $model->getCity());
        self::assertSame('United States of CAT', $model->getCountry());
        self::assertSame('www.example.com', $model->getWww());
        self::assertSame('Cat Scans Inc.', $model->getCompany());
        self::assertEquals(new \DateTime('2022-04-02T18:00'), $model->getLastlogin());
    }
}
