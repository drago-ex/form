<?php

/**
 * Test: Drago\Form\ExtraForms
 */

declare(strict_types=1);

use Drago\Form\Autocomplete;
use Drago\Form\ExtraForms;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test('ExtraForms email field', function () {
	$form = new ExtraForms;
	$email = $form->addEmailField();

	Assert::same('email', $email->getName());
	Assert::same('Email', $email->getCaption());
	Assert::same('Email address', $email->getControlPrototype()->placeholder);
	Assert::same(Autocomplete::Email->value, $email->getControlPrototype()->autocomplete);
	Assert::true($email->isRequired());
});

test('ExtraForms password and confirmation field', function () {
	$form = new ExtraForms;
	$pwd = $form->addPasswordField();

	Assert::same('password', $pwd->getName());
	Assert::same('Password', $pwd->getCaption());
	Assert::same('Your password', $pwd->getControlPrototype()->placeholder);
	Assert::true($pwd->isRequired());

	$verify = $form->addPasswordConfirmationField();
	Assert::same('verify', $verify->getName());
	Assert::same('Password to check', $verify->getCaption());
	Assert::same('Re-enter password', $verify->getControlPrototype()->placeholder);
	Assert::true($verify->isRequired());
});

test('ExtraForms confirmation field throws exception if password not present', function () {
	$form = new ExtraForms;

	Assert::exception(function () use ($form) {
		$form->addPasswordConfirmationField();
	}, InvalidArgumentException::class, 'Password field is required for password confirmation.');

	Assert::false(isset($form['verify']), 'the form is left unchanged');
});


test('ExtraForms confirmation field must match the password', function () {
	$form = new ExtraForms;
	$form->addPasswordField();
	$form->addPasswordConfirmationField();

	$form->setValues(['password' => 'Secret123!', 'verify' => 'Other123!']);
	$form['verify']->validate();
	Assert::same(['Passwords do not match.'], $form['verify']->getErrors());
});
