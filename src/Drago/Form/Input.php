<?php

/**
 * Drago Extension
 * Package built on Nette Framework
 */

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Controls\TextInput;


/**
 * Custom text input extending Nette's TextInput.
 *
 * Adds fluent setter methods for common HTML attributes
 * via the FluentAttributes trait.
 */
class Input extends TextInput
{
	use FluentAttributes;
}
