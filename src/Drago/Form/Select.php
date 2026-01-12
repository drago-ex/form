<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Controls\SelectBox;


/**
 * Select control with fluent attribute support.
 */
class Select extends SelectBox implements ItemsControl
{
	use FluentAttributes;
}
