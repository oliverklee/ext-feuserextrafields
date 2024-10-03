<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Tests\Functional\Domain\Model\Fixtures\XclassFrontendUser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser
 */
final class FrontendUserTest extends FunctionalTestCase
{
    protected bool $initializeDatabase = false;

    protected array $testExtensionsToLoad = ['oliverklee/feuserextrafields'];

    /**
     * @test
     */
    public function canBeSubclassed(): void
    {
        // @phpstan-ignore offsetAccess.nonOffsetAccessible, offsetAccess.nonOffsetAccessible
        $xclassConfiguration = &$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'];
        self::assertIsArray($xclassConfiguration);
        $xclassConfiguration[FrontendUser::class] = ['className' => XclassFrontendUser::class];

        $instance = GeneralUtility::makeInstance(FrontendUser::class);

        self::assertInstanceOf(XclassFrontendUser::class, $instance);
    }
}
