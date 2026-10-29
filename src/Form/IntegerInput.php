<?php declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Form;


/**
 * Number input validated as an integer on the server, like Nette's addInteger().
 * An empty value is null; a valid value is converted to int during validation.
 */
class IntegerInput extends Input
{
	public function __construct(?string $label = null)
	{
		parent::__construct($label);
		$this->setHtmlType('number');
		$this->setNullable();
		$this->addRule(Form::Integer);
	}


	/** Sets the minimum, validated on the server and rendered as the min attribute. */
	public function setMin(int|float $value): static
	{
		return $this->addRule(Form::Min, null, $value);
	}


	/** Sets the maximum, validated on the server and rendered as the max attribute. */
	public function setMax(int|float $value): static
	{
		return $this->addRule(Form::Max, null, $value);
	}
}
