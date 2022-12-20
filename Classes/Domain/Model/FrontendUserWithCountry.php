<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * Model for a front-end user with a country field (to be used with the `static_info_tables` extension).
 *
 * @deprecated will be removed in feuserextrafields 6.0
 */
class FrontendUserWithCountry extends FrontendUser
{
    /**
     * ISO 3166-1 A3 country code as three digit string (i.e., `AUT`)
     *
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 3})
     */
    protected $staticInfoCountry = '';

    public function getStaticInfoCountry(): string
    {
        return $this->staticInfoCountry;
    }

    public function setStaticInfoCountry(string $countryCode): void
    {
        $this->staticInfoCountry = $countryCode;
    }
}
