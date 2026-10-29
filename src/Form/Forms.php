<?php declare(strict_types=1);

namespace Drago\Form;

use Nette\Application\UI\Form;


/** Extended Nette Form with helper methods and fluent input support. */
class Forms extends Form
{
	/** Lowercase letters and numbers separated by single hyphens, e.g. about-us; also usable in route masks. */
	public const string SlugPattern = '[a-z0-9]+(?:-[a-z0-9]+)*';


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


	/** A slug of an address; at most 255 characters, the length of the slug columns (VARCHAR(255)). */
	public function addSlugInput(string $name, ?string $label = null): Input
	{
		return $this->addTextInput($name, $label)
			->setAutocomplete(Autocomplete::Off)
			->addRule(self::Pattern, 'Use lowercase letters, numbers and hyphens.', self::SlugPattern)
			->addRule(self::MaxLength, 'The slug can have at most %d characters.', 255);
	}


	public function addTextAreaInput(string $name, ?string $label = null): Textarea
	{
		$input = new Textarea($label);
		$this->addComponent($input, $name);
		return $input;
	}


	private function createInput(string $name, ?string $label, string $type = 'text'): Input
	{
		$input = new Input($label);
		$input->setHtmlType($type);
		$this->addComponent($input, $name);
		return $input;
	}
}
