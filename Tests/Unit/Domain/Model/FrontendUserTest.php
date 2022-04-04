<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser
 */
final class FrontendUserTest extends UnitTestCase
{
    /**
     * @var FrontendUser
     *
     * We can make this property private once we drop support for TYPO3 V9.
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new FrontendUser();
    }

    /**
     * @test
     */
    public function isAbstractEntity(): void
    {
        self::assertInstanceOf(AbstractEntity::class, $this->subject);
    }

    /**
     * @test
     */
    public function getUsernameInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getUsername();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setUsernameSetsUsername(): void
    {
        $username = 'don.juan';

        $this->subject->setUsername($username);

        self::assertSame($username, $this->subject->getUsername());
    }

    /**
     * @test
     */
    public function getPasswordInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getPassword();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setPasswordSetsPassword(): void
    {
        $password = 'f00Bar';

        $this->subject->setPassword($password);

        self::assertSame($password, $this->subject->getPassword());
    }

    /**
     * @test
     */
    public function getUsergroupInitiallyReturnsEmptyStorage(): void
    {
        $result = $this->subject->getUsergroup();

        self::assertInstanceOf(ObjectStorage::class, $result);
        self::assertCount(0, $result);
    }

    /**
     * @test
     */
    public function setUsergroupSetsUserGroups(): void
    {
        /** @var ObjectStorage<FrontendUserGroup> $userGroups */
        $userGroups = new ObjectStorage();
        $userGroups->attach(new FrontendUserGroup('foo'));

        $this->subject->setUsergroup($userGroups);

        self::assertSame($userGroups, $this->subject->getUsergroup());
    }

    /**
     * @test
     */
    public function addUsergroupAddsUserGroup(): void
    {
        $userGroup = new FrontendUserGroup('foo');

        $this->subject->addUsergroup($userGroup);

        self::assertTrue($this->subject->getUsergroup()->contains($userGroup));
    }

    /**
     * @test
     */
    public function removeUsergroupRemovesUserGroup(): void
    {
        $userGroup = new FrontendUserGroup('foo');
        $this->subject->addUsergroup($userGroup);
        self::assertTrue($this->subject->getUsergroup()->contains($userGroup));

        $this->subject->removeUsergroup($userGroup);

        self::assertFalse($this->subject->getUsergroup()->contains($userGroup));
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getName();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setNameSetsName(): void
    {
        $name = 'don juan';

        $this->subject->setName($name);

        self::assertSame($name, $this->subject->getName());
    }

    /**
     * @test
     */
    public function getFirstNameInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getFirstName();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setFirstNameSetsFirstName(): void
    {
        $firstName = 'don';

        $this->subject->setFirstName($firstName);

        self::assertSame($firstName, $this->subject->getFirstName());
    }

    /**
     * @test
     */
    public function getMiddleNameInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getMiddleName();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setMiddleNameSetsMiddleName(): void
    {
        $middleName = 'miguel';

        $this->subject->setMiddleName($middleName);

        self::assertSame($middleName, $this->subject->getMiddleName());
    }

    /**
     * @test
     */
    public function getLastNameInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getLastName();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setLastNameSetsLastName(): void
    {
        $lastName = 'juan';

        $this->subject->setLastName($lastName);

        self::assertSame($lastName, $this->subject->getLastName());
    }

    /**
     * @test
     */
    public function getAddressInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getAddress();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setAddressSetsAddress(): void
    {
        $address = 'foobar 42, foo';

        $this->subject->setAddress($address);

        self::assertSame($address, $this->subject->getAddress());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getTelephone();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone(): void
    {
        $telephone = '42';

        $this->subject->setTelephone($telephone);

        self::assertSame($telephone, $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getFaxInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getFax();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setFaxSetsFax(): void
    {
        $fax = '42';

        $this->subject->setFax($fax);

        self::assertSame($fax, $this->subject->getFax());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getEmail();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setEmailSetsEmail(): void
    {
        $email = 'don.juan@example.com';

        $this->subject->setEmail($email);

        self::assertSame($email, $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getLockToDomainInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getLockToDomain();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setLockToDomainSetsLockToDomain(): void
    {
        $lockToDomain = 'foo.bar';

        $this->subject->setLockToDomain($lockToDomain);

        self::assertSame($lockToDomain, $this->subject->getLockToDomain());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getTitle();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $title = 'foobar';

        $this->subject->setTitle($title);

        self::assertSame($title, $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getZipInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getZip();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setZipSetsZip(): void
    {
        $zip = '42123';

        $this->subject->setZip($zip);

        self::assertSame($zip, $this->subject->getZip());
    }

    /**
     * @test
     */
    public function getCityInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getCity();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setCitySetsCity(): void
    {
        $city = 'foo';

        $this->subject->setCity($city);

        self::assertSame($city, $this->subject->getCity());
    }

    /**
     * @test
     */
    public function getCountryInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getCountry();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setCountrySetsCountry(): void
    {
        $country = 'foo';

        $this->subject->setCountry($country);

        self::assertSame($country, $this->subject->getCountry());
    }

    /**
     * @test
     */
    public function getWwwInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getWww();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setWwwSetsWww(): void
    {
        $www = 'foo.bar';

        $this->subject->setWww($www);

        self::assertSame($www, $this->subject->getWww());
    }

    /**
     * @test
     */
    public function getCompanyInitiallyReturnsEmptyString(): void
    {
        $result = $this->subject->getCompany();

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function setCompanySetsCompany(): void
    {
        $company = 'foo bar';

        $this->subject->setCompany($company);

        self::assertSame($company, $this->subject->getCompany());
    }

    /**
     * @test
     */
    public function getLastloginInitiallyReturnsNull(): void
    {
        $result = $this->subject->getLastlogin();

        self::assertNull($result);
    }

    /**
     * @test
     */
    public function setLastloginSetsLastlogin(): void
    {
        $date = new \DateTime();

        $this->subject->setLastlogin($date);

        self::assertSame($date, $this->subject->getLastlogin());
    }
}
