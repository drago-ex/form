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
	 * Add a select box.
	 */
	public function addSelectBox(string $name, ?string $label = null, array $items = []): Select
	{
		return $this->addSelectInput(
			name: $name,
			label: $label,
			items: $items,
			controlClass: Select::class,
		);
	}


	/**
	 * Add a multi-select box.
	 */
	public function addMultiSelectBox(string $name, ?string $label = null, array $items = []): MultiSelect
	{
		return $this->addSelectInput(
			name: $name,
			label: $label,
			items: $items,
			controlClass: MultiSelect::class,
		);
	}


	/**
	 * Private helper to create select controls.
	 *
	 * @template T of ItemsControl
	 * @param class-string<T> $controlClass
	 * @return T
	 */
	private function addSelectInput(
		string $name,
		?string $label,
		array $items,
		string $controlClass,
	): ItemsControl
	{
		$control = new $controlClass($label);
		$control->setItems($items);
		$this->addComponent($control, $name);
		return $control;
	}
}
