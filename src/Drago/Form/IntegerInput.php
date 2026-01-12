<?php

declare(strict_types=1);

namespace Drago\Form;


/**
 * Custom input for numbers with min/max support.
 */
class IntegerInput extends Input
{
	use FluentAttributes;

	public function __construct(?string $label = null)
	{
		parent::__construct($label);
		$this->setHtmlType('number');
	}


	/**
	 * Set the minimum value for the number input.
	 */
	public function setMin(int|float $value): static
	{
		return $this->setHtmlAttribute('min', (string) $value);
	}


	/**
	 * Set the maximum value for the number input.
	 */
	public function setMax(int|float $value): static
	{
		return $this->setHtmlAttribute('max', (string) $value);
	}
}
