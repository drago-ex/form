<?php

/**
 * Drago Extension
 * Package built on Nette Framework
 */

declare(strict_types=1);

namespace Drago\Form;

use Nette\Application\UI\Form;
use Nette\Forms\Controls\BaseControl;
use Nette\Forms\Controls\MultiSelectBox;
use Nette\Forms\Controls\SelectBox;


/**
 * Extended Nette Form with helper methods and fluent input support.
 */
class Forms extends Form
{
	/**
	 * Add a text input with fluent methods.
	 */
	public function addTextInput(string $name, ?string $label = null): Input
	{
		$input = new Input($label);
		$this->addComponent($input, $name);
		return $input;
	}


	/**
	 * Add an email input with fluent methods.
	 */
	public function addEmailInput(string $name, ?string $label = null): Input
	{
		$input = new Input($label);
		$input->setHtmlType('email');
		$this->addComponent($input, $name);
		return $input;
	}


	/**
	 * Add a password input with fluent methods.
	 */
	public function addPasswordInput(string $name, ?string $label = null): Input
	{
		$input = new Input($label);
		$input->setHtmlType('password');
		$this->addComponent($input, $name);
		return $input;
	}


	/**
	 * Add a standard select box.
	 */
	public function addSelectBox(string $name, ?string $label = null, array $items = []): BaseControl
	{
		return $this->addSelectInput($name, $label, $items);
	}


	/**
	 * Add a multi-select box.
	 */
	public function addMultiSelectBox(string $name, ?string $label = null, array $items = []): BaseControl
	{
		return $this->addSelectInput($name, $label, $items, true);
	}


	/**
	 * Private helper to create select controls.
	 */
	private function addSelectInput(
		string $name,
		?string $label,
		array $items,
		bool $multi = false,
	): BaseControl {
		$controlClass = $multi ? MultiSelectBox::class : SelectBox::class;
		$control = new $controlClass($label);
		$control->setItems($items);
		$this->addComponent($control, $name);
		return $control;
	}
}
