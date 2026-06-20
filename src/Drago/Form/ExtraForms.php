<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Form;


/** Commonly used inputs. */
class ExtraForms extends Forms
{
	public function addPasswordField(): Input
	{
		return $this->addPasswordInput('password', 'Password')
			->setPlaceholder('Your password')
			->setRequired('Please enter your password.');
	}


	public function addPasswordConfirmationField(): Input
	{
		$passwordField = $this->addPasswordInput('verify', 'Password to check')
			->setPlaceholder('Re-enter password')
			->setRequired('Please enter your password to check.');

		if (!isset($this['password'])) {
			throw new \InvalidArgumentException('Password field is required for password confirmation.');
		}

		$passwordField->addRule(Form::Equal, 'Passwords do not match.', $this['password']);
		return $passwordField;
	}


	public function addEmailField(): Input
	{
		return $this->addEmailInput('email', 'Email')
			->setPlaceholder('Email address')
			->setRequired('Please enter your email address.')
			->setAutocomplete(Autocomplete::Email)
			->addRule(Form::Email);
	}
}
