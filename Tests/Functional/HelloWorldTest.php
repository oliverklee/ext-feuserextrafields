<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Functional;

use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @coversNothing
 */
final class HelloWorldTest extends FunctionalTestCase
{
    /**
     * @var array<int, non-empty-string>
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/feuserextrafields'];

    /**
     * @test
     */
    public function timeSpaceContinuumIsOkay(): void
    {
        self::assertSame(4, 2 + 2);
    }
}
