<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @coversNothing
 */
final class HelloWorldTest extends UnitTestCase
{
    /**
     * @test
     */
    public function timeSpaceContinuumIsOkay(): void
    {
        self::assertSame(4, 2 + 2);
    }
}
