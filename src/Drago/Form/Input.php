<?php

/**
 * Drago Extension
 * Package built on Nette Framework
 */

declare(strict_types=1);

namespace Drago\Forms;

use Nette\Forms\Controls\TextInput;
use Stringable;


/**
 * Custom text input class that extends Nette's TextInput,
 * adding a convenient method for setting the autocomplete attribute.
 */
class Input extends TextInput
{
	public function __construct(string|Stringable|null $label = null, ?string $maxLength = null)
	{
		parent::__construct($label, $maxLength);
	}


	/**
	 * Set the autocomplete attribute for the input field.
	 *
	 * @param string $autocompleteValue The value for the autocomplete attribute.
	 */
	public function setAutocomplete(string $autocompleteValue): self
	{
		return $this->setHtmlAttribute('autocomplete', $autocompleteValue);
	}


	/**
	 * Set the placeholder attribute for the input field.
	 *
	 * @param string $placeholder The placeholder text.
	 */
	public function setPlaceholder(string $placeholder): self
	{
		return $this->setHtmlAttribute('placeholder', $placeholder);
	}
}
