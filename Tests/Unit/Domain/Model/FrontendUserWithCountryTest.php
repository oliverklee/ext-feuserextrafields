<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry;
use OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model\Fixtures\XclassFrontendUserWithCountry;
use OliverKlee\FeUserExtraFields\Tests\Unit\Support\MakeInstanceCacheFlusher;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry
 */
final class FrontendUserWithCountryTest extends UnitTestCase
{
    /**
     * @var FrontendUserWithCountry
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();
        MakeInstanceCacheFlusher::flushMakeInstanceCache();

        $this->subject = new FrontendUserWithCountry();
    }

    protected function tearDown(): void
    {
        // @phpstan-ignore-next-line We know that the necessary array keys exist.
        unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FrontendUserWithCountry::class]);
        MakeInstanceCacheFlusher::flushMakeInstanceCache();
        parent::tearDown();
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
    public function extendsUserWithoutCountry(): void
    {
        self::assertInstanceOf(FrontendUser::class, $this->subject);
    }

    /**
     * @test
     */
    public function canBeSubclassed(): void
    {
        // @phpstan-ignore-next-line We know that the necessary array keys exist.
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FrontendUserWithCountry::class]
            = ['className' => XclassFrontendUserWithCountry::class];

        $instance = GeneralUtility::makeInstance(FrontendUserWithCountry::class);

        self::assertInstanceOf(XclassFrontendUserWithCountry::class, $instance);
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
    public function getStaticInfoCountryInitiallyReturnsEmptyString(): void
    {
        self::assertSame('', $this->subject->getStaticInfoCountry());
    }

    /**
     * @test
     */
    public function setStaticInfoCountrySetsStaticInfoCountry(): void
    {
        $value = 'DEU';
        $this->subject->setStaticInfoCountry($value);

        self::assertSame($value, $this->subject->getStaticInfoCountry());
    }
}
