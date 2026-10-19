<?php

/**
 * Test: Drago\Form\IntegerInput
 */

declare(strict_types=1);

use Drago\Form\Forms;
use Drago\Form\IntegerInput;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


function submit(IntegerInput $input, string $value): Forms
{
	$form = $input->getForm();
	assert($form instanceof Forms);
	$input->setValue($value);
	$input->validate();
	return $form;
}


test('A valid number is converted to an integer', function () {
	$form = new Forms;
	$input = $form->addIntegerInput('count');

	submit($input, '42');
	Assert::false($input->hasErrors());
	Assert::same(42, $input->getValue());
});


test('A value that is not an integer is rejected on the server', function () {
	$form = new Forms;
	$input = $form->addIntegerInput('count');

	submit($input, 'abc');
	Assert::true($input->hasErrors());

	$form = new Forms;
	$input = $form->addIntegerInput('count');
	submit($input, '1.5');
	Assert::true($input->hasErrors());
});


test('An empty optional value is null and valid', function () {
	$form = new Forms;
	$input = $form->addIntegerInput('count');

	submit($input, '');
	Assert::false($input->hasErrors());
	Assert::null($input->getValue());
});


test('Minimum and maximum are checked on the server and rendered as attributes', function () {
	$form = new Forms;
	$input = $form->addIntegerInput('age')->setMin(18)->setMax(120);

	Assert::same('number', $input->getControlPrototype()->type);
	Assert::same('18', (string) $input->getControl()->min);
	Assert::same('120', (string) $input->getControl()->max);

	submit($input, '17');
	Assert::true($input->hasErrors());

	$form = new Forms;
	$input = $form->addIntegerInput('age')->setMin(18)->setMax(120);
	submit($input, '121');
	Assert::true($input->hasErrors());

	$form = new Forms;
	$input = $form->addIntegerInput('age')->setMin(18)->setMax(120);
	submit($input, '30');
	Assert::false($input->hasErrors());
	Assert::same(30, $input->getValue());
});
