<?php

declare(strict_types=1);

namespace OliverKlee\FeUserExtraFields\Tests\Unit\Domain\Model;

use OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser;
use OliverKlee\FeUserExtraFields\Domain\Model\Gender;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers OliverKlee\FeUserExtraFields\Domain\Model\Gender
 */
final class GenderTest extends UnitTestCase
{
    /**
     * @test
     */
    public function maleReturnsValueForMale(): void
    {
        self::assertSame(FrontendUser::GENDER_MALE, Gender::male());
    }

    /**
     * @test
     */
    public function femaleReturnsValueForFemale(): void
    {
        self::assertSame(FrontendUser::GENDER_FEMALE, Gender::female());
    }

    /**
     * @test
     */
    public function diverseReturnsValueForDiverse(): void
    {
        self::assertSame(FrontendUser::GENDER_DIVERSE, Gender::diverse());
    }

    /**
     * @test
     */
    public function notProvidedReturnsValueForNotProvided(): void
    {
        self::assertSame(FrontendUser::GENDER_NOT_PROVIDED, Gender::notProvided());
    }

    /**
     * @return array<non-empty-string, array{0: int|null}>
     */
    public static function validGenderDataProvider(): array
    {
        return [
            'not provided' => [Gender::notProvided()],
            'diverse' => [Gender::diverse()],
            'female' => [Gender::female()],
            'male' => [Gender::male()],
        ];
    }

    /**
     * @test
     *
     * @dataProvider validGenderDataProvider
     */
    public function allExistingGendersAreValid(?int $gender): void
    {
        self::assertTrue(Gender::isValidGender($gender));
    }

    /**
     * @return array<non-empty-string, array{0: int}>
     */
    public static function invalidGenderDataProvider(): array
    {
        return [
            'negative' => [-1],
            'too large' => [100],
            'unassigned in the middle' => [50],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidGenderDataProvider
     */
    public function invalidGenderValuesAreInvalid(int $gender): void
    {
        self::assertFalse(Gender::isValidGender($gender));
    }
}
