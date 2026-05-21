<?php

declare(strict_types=1);

namespace Drago\Form;


/** Trait providing fluent setters for common HTML attributes. */
trait FluentAttributes
{
	public function setAutocomplete(string|Autocomplete $value): static
	{
		return $this->setHtmlAttribute(
			'autocomplete',
			$value instanceof Autocomplete ? $value->value : $value,
		);
	}


	public function setPlaceholder(string $value): static
	{
		return $this->setHtmlAttribute('placeholder', $value);
	}
}
