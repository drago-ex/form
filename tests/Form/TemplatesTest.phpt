<?php

/**
 * Test: bundled Latte form templates
 */

declare(strict_types=1);

use Drago\Form\Forms;
use Latte\Engine;
use Latte\Loaders\StringLoader;
use Nette\Bridges\FormsLatte\FormsExtension;
use Tester\Assert;
use Tester\DomQuery;

require __DIR__ . '/../bootstrap.php';


function createLatte(string $page, ?Forms $form = null): Engine
{
	$templates = ['page' => $page];
	foreach (glob(__DIR__ . '/../../src/assets/latte/*.latte') as $file) {
		$templates[basename($file)] = file_get_contents($file);
	}

	$latte = new Engine;
	$latte->setLoader(new StringLoader($templates));
	$latte->addExtension(new FormsExtension);

	// The template finds the form by its name in the control, as in an application.
	$control = new class extends Nette\Application\UI\Presenter {
	};
	$control->injectPrimary(new Nette\Http\Request(new Nette\Http\UrlScript('http://localhost/')), new Nette\Http\Response);
	if ($form !== null) {
		$control->addComponent($form, 'register');
	}
	$latte->addExtension(new Nette\Bridges\ApplicationLatte\UIExtension($control));
	$latte->addExtension(new Latte\Essential\TranslatorExtension(fn(string|Stringable $message): string => (string) $message));
	return $latte;
}


function createForm(): Forms
{
	$form = new Forms;
	$form->setAction('/send');
	$form->addTextInput('username', 'Username');
	$form->addPasswordInput('password', 'Password');
	$form->addSelect('role', 'Role', ['admin' => 'Admin', 'user' => 'User']);
	$form->addCheckbox('agree', 'Agree');
	$form->addSubmit('send', 'Send');
	return $form;
}


test('All bundled templates compile', function () {
	$latte = createLatte('');
	foreach (glob(__DIR__ . '/../../src/assets/latte/*.latte') as $file) {
		Assert::noError(fn() => $latte->compile(basename($file)));
	}
});


test('The form template renders Bootstrap fields', function () {
	$form = createForm();
	$html = createLatte('{embed "@form.latte", name: "register", form: $form, class: "ajax"}{block form}{include input, name: "username", columns: 6}{include input, type: "select", name: "role"}{include submit, name: "send"}{/block}{/embed}', $form)
		->renderToString('page', ['form' => $form]);

	$dom = DomQuery::fromHtml($html);
	Assert::true($dom->has('form.row.g-3.ajax'));
	Assert::true($dom->has('.col-md-6 input.form-control[name=username]'));
	Assert::true($dom->has('select.form-select[name=role]'));
	Assert::true($dom->has('input.btn.btn-primary[data-btn-submit][name=send]'));
});


test('The checkbox template renders a Bootstrap check', function () {
	$form = createForm();
	$html = createLatte('{embed "@form.latte", name: "register", form: $form}{block form}{include checkbox, name: "agree", class: "x"}{/block}{/embed}', $form)
		->renderToString('page', ['form' => $form]);

	$dom = DomQuery::fromHtml($html);
	Assert::true($dom->has('.form-check > input.form-check-input.x[type=checkbox][name=agree]'));
	Assert::true($dom->has('.form-check > label.form-check-label[for=frm-register-agree]'));
});


test('The password template renders the toggle wrapper', function () {
	$form = createForm();
	$html = createLatte('{import "@form-password.latte"}<form n:name="register">{include password-toggle, name: "password"}</form>', $form)
		->renderToString('page', ['form' => $form]);

	$dom = DomQuery::fromHtml($html);
	Assert::true($dom->has('.password-toggle-wrapper input.form-control.input-password[name=password]'));
	Assert::true($dom->has('.password-toggle-wrapper button.toggle-password'));

	$form = createForm();
	$html = createLatte('{import "@form-password.latte"}<form n:name="register">{include password-toggle, name: "password", class: "extra"}</form>', $form)
		->renderToString('page', ['form' => $form]);
	Assert::contains('class="form-control input-password extra"', $html);
});


test('The Tom Select template adds the given class to form-select', function () {
	$form = createForm();
	$latte = createLatte('{import "@form-tom-select.latte"}<form n:name="register">{include selectTom, name: "role"}{include selectTom, name: "role", class: "tom-select"}</form>', $form);
	$html = $latte->renderToString('page', ['form' => $form]);
	Assert::contains('id="frm-register-role" class="form-select">', $html);
	Assert::contains('id="frm-register-role" class="form-select tom-select">', $html);
});
