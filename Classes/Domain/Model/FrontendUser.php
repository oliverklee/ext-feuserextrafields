<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Model for a front-end user without a country field (to be used without the `static_info_tables` extension).
 */
class FrontendUser extends AbstractEntity
{
    use CreationDateTrait;
    use ModificationDateTrait;

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
    public const GENDER_DIVERSE = 2;

    /**
     * @var int
     */
    public const GENDER_NOT_PROVIDED = 99;

    /**
     * @var array<int, self::GENDER_*>
     */
    public const VALID_GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
        self::GENDER_DIVERSE,
        self::GENDER_NOT_PROVIDED,
    ];

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
     * @var array<int, self::STATUS_*>
     */
    public const VALID_STATUSES = [
        self::STATUS_NONE,
        self::STATUS_STUDENT,
        self::STATUS_JOB_SEEKING_FULL_TIME,
        self::STATUS_WORKING,
        self::STATUS_RETIRED,
        self::STATUS_JOB_SEEKING_PART_TIME,
    ];

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 255})
     */
    protected $username = '';

    /**
     * the password hash
     *
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 100})
     */
    protected $password = '';

    /**
     * @var ObjectStorage<FrontendUserGroup>
     */
    protected $userGroup;

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 160})
     */
    protected $name = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 50})
     */
    protected $firstName = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 50})
     */
    protected $middleName = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 50})
     */
    protected $lastName = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 255})
     */
    protected $address = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 30})
     */
    protected $telephone = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 255})
     */
    protected $email = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 40})
     */
    protected $title = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 10})
     */
    protected $zip = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 50})
     */
    protected $city = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 40})
     */
    protected $country = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 80})
     */
    protected $www = '';

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 80})
     */
    protected $company = '';

    /**
     * @var ObjectStorage<FileReference>
     */
    protected $image;

    /**
     * @var \DateTime|null
     */
    protected $lastLogin;

    /**
     * salutation (possibly including a name), e.g., "Hello" or "Good day, Mr. Smith"
     *
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 255})
     */
    protected $fullSalutation = '';

    /**
     * @var int
     * @phpstan-var self::GENDER_*
     */
    protected $gender = self::GENDER_NOT_PROVIDED;

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 45})
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
     * @phpstan-var self::STATUS_*
     */
    protected $status = self::STATUS_NONE;

    /**
     * @var string
     * @Extbase\Validate("StringLength", options={"maximum": 65535})
     */
    protected $comments = '';

    public function __construct(string $username = '', string $password = '')
    {
        $this->username = $username;
        $this->password = $password;
        $this->initializeObject();
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

    /**
     * Returns the password hash (or an empty string).
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the password hash.
     */
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
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

    public function getFullSalutation(): string
    {
        return $this->fullSalutation;
    }

    public function setFullSalutation(string $fullSalutation): void
    {
        $this->fullSalutation = $fullSalutation;
    }

    public static function isValidGender(int $gender): bool
    {
        return \in_array($gender, self::VALID_GENDERS, true);
    }

    /**
     * @return self::GENDER_*
     */
    public function getGender(): int
    {
        $gender = $this->gender;
        \assert(\in_array($gender, self::VALID_GENDERS, true));

        return $gender;
    }

    /**
     * @param self::GENDER_* $gender
     */
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

    /**
     * @return self::STATUS_*
     */
    public function getStatus(): int
    {
        $status = $this->status;
        \assert(\in_array($status, self::VALID_STATUSES, true));

        return $status;
    }

    /**
     * @param self::STATUS_* $status
     */
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
