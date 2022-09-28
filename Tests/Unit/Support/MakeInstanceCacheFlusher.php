<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Support;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class to provide access to protected static members of `GeneralUtility`.
 *
 * @deprecated Replace `GeneralUtlity::flushInternalRuntimeCaches` once we require core versions that have the
 * corresponding patch.
 */
final class MakeInstanceCacheFlusher extends GeneralUtility
{
    /**
     * Flushes the class name cache for `GeneralUtility::makeInstance()`.
     */
    public static function flushMakeInstanceCache(): void
    {
        self::$finalClassNameCache = [];
    }
}
