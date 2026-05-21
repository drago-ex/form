<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Controls\TextArea as NetteTextArea;


/** Custom textarea with fluent attribute setters. */
class Textarea extends NetteTextArea
{
	use FluentAttributes;
}
