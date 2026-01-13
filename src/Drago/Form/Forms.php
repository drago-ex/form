<?php

/**
 * Drago Extension
 * Package built on Nette Framework
 */

declare(strict_types=1);

namespace Drago\Form;

use Nette\Application\UI\Form;


/**
 * Extended Nette Form with helper methods and fluent input support.
 *
 * Provides convenient methods to create inputs and select boxes
 * with fluent API and autocomplete support.
 */
class Forms extends Form
{
	/**
	 * Create and add an Input field.
	 */
	private function createInput(string $name, ?string $label, ?string $type = 'text'): Input
	{
		$input = new Input($label);
		$input->setHtmlType($type);
		$this->addComponent($input, $name);
		return $input;
	}


	/**
	 * Add a text input field.
	 */
	public function addTextInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label);
	}


	/**
	 * Add an email input field.
	 */
	public function addEmailInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'email');
	}


	/**
	 * Add a password input field.
	 */
	public function addPasswordInput(string $name, ?string $label = null): Input
	{
		return $this->createInput($name, $label, 'password');
	}


	/**
	 * Add a numeric input (type="number") with fluent min/max support.
	 */
	public function addIntegerInput(string $name, ?string $label = null): IntegerInput
	{
		$input = new IntegerInput($label);
		$this->addComponent($input, $name);
		return $input;
	}


	/**
	 * Adds a textarea field.
	 */
	public function addTextAreaForm(string $name, ?string $label = null): Textarea
	{
		$input = new Textarea($label);
		$this->addComponent($input, $name);
		return $input;
	}
}
