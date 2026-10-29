<?php declare(strict_types=1);

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
		if (!isset($this['password'])) {
			throw new \InvalidArgumentException('Password field is required for password confirmation.');
		}

		$passwordField = $this->addPasswordInput('verify', 'Password to check')
			->setPlaceholder('Re-enter password')
			->setRequired('Please enter your password to check.');

		$passwordField->addRule(Form::Equal, 'Passwords do not match.', $this['password']);
		return $passwordField;
	}


	public function addEmailField(): Input
	{
		return $this->addEmailInput('email', 'Email')
			->setPlaceholder('Email address')
			->setAutocomplete(Autocomplete::Email)
			->setRequired('Please enter your email address.')
			->addRule(Form::Email);
	}
}
