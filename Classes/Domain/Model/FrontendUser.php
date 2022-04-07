<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Model for a front-end user without a country field (to be used without the `static_info_tables` extension).
 */
class FrontendUser extends AbstractEntity
{
    /**
     * @var int
     */
    public const GENDER_MALE = 0;

    /**
     * @var int
     */
    public const GENDER_FEMALE = 1;

    /**
     * @var int
     */
    public const GENDER_NOT_PROVIDED = 99;

    /**
     * @var array<int, int<0, max>>
     */
    protected const VALID_GENDERS = [self::GENDER_MALE, self::GENDER_FEMALE, self::GENDER_NOT_PROVIDED];

    /**
     * @var int
     */
    public const STATUS_NONE = 0;

    /**
     * @var int
     */
    public const STATUS_STUDENT = 1;

    /**
     * @var int
     */
    public const STATUS_JOB_SEEKING_FULL_TIME = 2;

    /**
     * @var int
     */
    public const STATUS_WORKING = 3;

    /**
     * @var int
     */
    public const STATUS_RETIRED = 4;

    /**
     * @var int
     */
    public const STATUS_JOB_SEEKING_PART_TIME = 5;

    /**
     * @var array<int, int<0, max>>
     */
    protected const VALID_STATUSES = [
        self::STATUS_NONE,
        self::STATUS_STUDENT,
        self::STATUS_JOB_SEEKING_FULL_TIME,
        self::STATUS_WORKING,
        self::STATUS_RETIRED,
        self::STATUS_JOB_SEEKING_PART_TIME,
    ];

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $password = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup>
     */
    protected $userGroup;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $firstName = '';

    /**
     * @var string
     */
    protected $middleName = '';

    /**
     * @var string
     */
    protected $lastName = '';

    /**
     * @var string
     */
    protected $address = '';

    /**
     * @var string
     */
    protected $telephone = '';

    /**
     * @var string
     */
    protected $fax = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $lockToDomain = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $zip = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $country = '';

    /**
     * @var string
     */
    protected $www = '';

    /**
     * @var string
     */
    protected $company = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $image;

    /**
     * @var \DateTime|null
     */
    protected $lastLogin;

    /**
     * @var int
     */
    protected $gender = self::GENDER_NOT_PROVIDED;

    /**
     * @var string
     */
    protected $zone = '';

    /**
     * "privacy agreement accepted" flag
     *
     * @var bool
     */
    protected $privacy = false;

    /**
     * @var \DateTime|null
     */
    protected $dateOfBirth;

    /**
     * @var int
     */
    protected $status = self::STATUS_NONE;

    /**
     * @var string
     */
    protected $comments = '';

    public function __construct(string $username = '', string $password = '')
    {
        $this->username = $username;
        $this->password = $password;
        $this->userGroup = new ObjectStorage();
        $this->image = new ObjectStorage();
    }

    /**
     * Properly initializes all associations (as fetching an entity from the DB does not use the constructor).
     */
    public function initializeObject(): void
    {
        $this->userGroup = new ObjectStorage();
        $this->image = new ObjectStorage();
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Returns the user groups. Keep in mind that the property is called "usergroup"
     * although it can hold several user groups.
     *
     * @return ObjectStorage<FrontendUserGroup>
     */
    public function getUserGroup(): ObjectStorage
    {
        return $this->userGroup;
    }

    /**
     * Sets the user groups. Keep in mind that the property is called "usergroup"
     * although it can hold several user groups.
     *
     * @param ObjectStorage<FrontendUserGroup> $groups
     */
    public function setUserGroup(ObjectStorage $groups): void
    {
        $this->userGroup = $groups;
    }

    public function addUserGroup(FrontendUserGroup $group): void
    {
        $this->userGroup->attach($group);
    }

    public function removeUserGroup(FrontendUserGroup $group): void
    {
        $this->userGroup->detach($group);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): void
    {
        $this->middleName = $middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getLockToDomain(): string
    {
        return $this->lockToDomain;
    }

    public function setLockToDomain(string $lockToDomain): void
    {
        $this->lockToDomain = $lockToDomain;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getWww(): string
    {
        return $this->www;
    }

    public function setWww(string $www): void
    {
        $this->www = $www;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * Gets the image. (This is a storage with 0 or 1 elements.)
     *
     * @return ObjectStorage<FileReference>
     */
    public function getImage(): ObjectStorage
    {
        return $this->image;
    }

    /**
     * Sets the image. (This is a storage with 0 or 1 elements.)
     *
     * @param ObjectStorage<FileReference> $images
     */
    public function setImage(ObjectStorage $images): void
    {
        $this->image = $images;
    }

    public function getLastLogin(): ?\DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(\DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getZone(): string
    {
        return $this->zone;
    }

    public function setZone(string $zone): void
    {
        $this->zone = $zone;
    }

    public function getPrivacy(): bool
    {
        return $this->privacy;
    }

    public function setPrivacy(bool $privacy): void
    {
        $this->privacy = $privacy;
    }

    public static function isValidGender(int $gender): bool
    {
        return \in_array($gender, self::VALID_GENDERS, true);
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getDateOfBirth(): ?\DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTime $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public static function isValidStatus(int $gender): bool
    {
        return \in_array($gender, self::VALID_STATUSES, true);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }
}
