<?php

/**
 * Test: Drago\Form\Rules\PasswordRules
 */

declare(strict_types=1);

use Drago\Form\Rules\PasswordRules;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test('Password rules constants and getters', function () {
	Assert::same(PasswordRules::StrongPattern, PasswordRules::strongPattern());
	Assert::same(PasswordRules::StrongMessage, PasswordRules::strongMessage());
});

test('Password strong pattern validation', function () {
	$pattern = '/' . PasswordRules::strongPattern() . '/';

	// Valid passwords
	Assert::same(1, preg_match($pattern, 'Secret123!'));
	Assert::same(1, preg_match($pattern, 'Str0ng#Pass'));
	Assert::same(1, preg_match($pattern, 'A1b2C3d4@'));

	// Invalid passwords
	Assert::same(0, preg_match($pattern, 'short1!')); // less than 8 chars
	Assert::same(0, preg_match($pattern, 'nouppercase123!')); // missing uppercase
	Assert::same(0, preg_match($pattern, 'NOLOWERCASE123!')); // missing lowercase
	Assert::same(0, preg_match($pattern, 'NoSpecialChar123')); // missing special character
	Assert::same(0, preg_match($pattern, 'NoDigits!@#$')); // missing digits
	Assert::same(0, preg_match($pattern, 'Space 123!Aa')); // contains space (\S required)
});
