<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Controls\TextInput;


/** Custom text input with fluent attribute setters. */
class Input extends TextInput
{
	use FluentAttributes;
}
