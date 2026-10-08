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


	public function addTextInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label);
	}


	public function addEmailInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'email');
	}


	public function addPasswordInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'password');
	}


	public function addIntegerInput(string $name, ?string $label = null): IntegerInput
	{
		$input = new IntegerInput($label);
		$this->addComponent($input, $name);
		return $input;
	}


	public function addTextAreaForm(string $name, ?string $label = null): Textarea
	{
		$input = new Textarea($label);
		$this->addComponent($input, $name);
		return $input;
	}
}
