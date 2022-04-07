<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry
 */
final class FrontendUserWithCountryTest extends UnitTestCase
{
    /**
     * @var FrontendUserWithCountry
     *
     * We can make this property private once we drop support for TYPO3 V9.
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new FrontendUserWithCountry();
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
