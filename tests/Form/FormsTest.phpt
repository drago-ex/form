<?php

/**
 * Test: Drago\Form\Forms
 */

declare(strict_types=1);

use Drago\Form\Autocomplete;
use Drago\Form\Forms;
use Drago\Form\Input;
use Drago\Form\IntegerInput;
use Drago\Form\Textarea;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test('Forms adding text, email and password inputs', function () {
	$form = new Forms;

	$text = $form->addTextInput('title', 'Title');
	Assert::type(Input::class, $text);
	Assert::same('text', $text->getControlPrototype()->type);
	Assert::same('Title', $text->getCaption());

	$email = $form->addEmailInput('email', 'Your Email');
	Assert::type(Input::class, $email);
	Assert::same('email', $email->getControlPrototype()->type);
	Assert::same('Your Email', $email->getCaption());

	$password = $form->addPasswordInput('pwd', 'Password');
	Assert::type(Input::class, $password);
	Assert::same('password', $password->getControlPrototype()->type);
	Assert::same('Password', $password->getCaption());
});

test('Forms adding integer input with min/max', function () {
	$form = new Forms;

	$num = $form->addIntegerInput('count', 'Count');
	Assert::type(IntegerInput::class, $num);
	Assert::same('number', $num->getControlPrototype()->type);

	$num->setMin(1)->setMax(100);
	Assert::same('1', $num->getControlPrototype()->min);
	Assert::same('100', $num->getControlPrototype()->max);
});

test('Forms adding textarea and fluent attributes', function () {
	$form = new Forms;

	$area = $form->addTextAreaForm('description', 'Description');
	Assert::type(Textarea::class, $area);

	$area->setPlaceholder('Enter description')
		->setAutocomplete(Autocomplete::Off)
		->setReadOnly();

	$control = $area->getControlPrototype();
	Assert::same('Enter description', $control->placeholder);
	Assert::same('off', $control->autocomplete);
	Assert::true($control->readonly);
});

test('FluentAttributes on Input', function () {
	$form = new Forms;
	$input = $form->addTextInput('username', 'Username');

	$input->setAutocomplete(Autocomplete::Username);
	Assert::same('username', $input->getControlPrototype()->autocomplete);

	$input->setAutocomplete('new-password');
	Assert::same('new-password', $input->getControlPrototype()->autocomplete);

	$input->setPlaceholder('Username...');
	Assert::same('Username...', $input->getControlPrototype()->placeholder);

	$input->setReadOnly();
	Assert::true($input->getControlPrototype()->readonly);
});
