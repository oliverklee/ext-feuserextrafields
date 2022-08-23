<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model\Fixtures\XclassFrontendUserGroup;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup
 */
class FrontendUserGroupTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    protected $initializeDatabase = false;

    protected function tearDown(): void
    {
        // @phpstan-ignore-next-line We know that the necessary array keys exist.
        unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FrontendUserGroup::class]);
        parent::tearDown();
    }

    /**
     * @test
     */
    public function canBeSubclassed(): void
    {
        // @phpstan-ignore-next-line We know that the necessary array keys exist.
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FrontendUserGroup::class]
            = ['className' => XclassFrontendUserGroup::class];

        $instance = GeneralUtility::makeInstance(FrontendUserGroup::class);

        self::assertInstanceOf(XclassFrontendUserGroup::class, $instance);
    }
}
