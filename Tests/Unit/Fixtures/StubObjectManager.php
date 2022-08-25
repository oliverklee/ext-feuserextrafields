<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Fixtures;

use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;

/**
 * Stub object manager for testing.
 */
final class StubObjectManager implements ObjectManagerInterface
{
    /**
     * Returns a fresh or existing instance of the class specified by $className.
     *
     * @template T
     *
     * @param class-string<T> $className the name of the class to return an instance of
     * @param array ...$constructorArguments
     *
     * @return never
     *
     * @throws \BadMethodCallException
     */
    public function get(string $className, ...$constructorArguments): object
    {
        throw new \BadMethodCallException('Not implemented.', 1661422571);
    }

    /**
     * Creates an instance of $className without calling its constructor.
     *
     * @template T
     *
     * @param class-string<T> $className the name of the class to return an instance of
     *
     * @return never
     *
     * @throws \BadMethodCallException
     */
    public function getEmptyObject(string $className): object
    {
        throw new \BadMethodCallException('Not implemented.', 1661422572);
    }
}
