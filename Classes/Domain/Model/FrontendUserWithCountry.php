<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

/**
 * Model for a front-end user with a country field (to be used witho the `static_info_tables` extension).
 */
class FrontendUserWithCountry extends FrontendUser
{
    /**
     * ISO 3166-1 A3 country code as three digit string (i.e., `AUT`)
     *
     * @var string
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
