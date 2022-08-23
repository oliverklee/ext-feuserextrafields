<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry;
use OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model\Fixtures\XclassFrontendUserWithCountry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry
 */
class FrontendUserWithCountryTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    protected $initializeDatabase = false;

    protected function tearDown(): void
    {
        // @phpstan-ignore-next-line We know that the necessary array keys exist.
        unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FrontendUserWithCountry::class]);
        parent::tearDown();
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
}
