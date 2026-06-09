<?php

declare(strict_types=1);

namespace Drago\Form\Rules;


/** Password validation helpers for Nette forms. */
final class PasswordRules
{
	public const string StrongPattern = '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?\d)(?=.*?[^A-Za-z0-9])[\S]{8,}$';
	public const string StrongMessage = 'The password must contain uppercase and lowercase letters, numbers, and a special character.';


	/** Returns the strong password validation pattern. */
	public static function strongPattern(): string
	{
		return self::StrongPattern;
	}


	/** Returns the strong password validation message. */
	public static function strongMessage(): string
	{
		return self::StrongMessage;
	}
}
