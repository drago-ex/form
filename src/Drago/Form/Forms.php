<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Application\UI\Form;


/** Extended Nette Form with helper methods and fluent input support. */
class Forms extends Form
{
	private function createInput(string $name, ?string $label, string $type = 'text'): Input
	{
		$input = new Input($label);
		$input->setHtmlType($type);
		$this->addComponent($input, $name);
		return $input;
	}


	/** Adds a text input field. */
	public function addTextInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label);
	}


	/** Adds an email input field. */
	public function addEmailInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'email');
	}


	/** Adds a password input field. */
	public function addPasswordInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'password');
	}


	/** Adds a numeric input with min/max support. */
	public function addIntegerInput(string $name, ?string $label = null): IntegerInput
	{
		$input = new IntegerInput($label);
		$this->addComponent($input, $name);
		return $input;
	}


	/** Adds a textarea field. */
	public function addTextAreaForm(string $name, ?string $label = null): Textarea
	{
		$input = new Textarea($label);
		$this->addComponent($input, $name);
		return $input;
	}
}
