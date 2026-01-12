<?php

declare(strict_types=1);

namespace Drago\Form;

use Nette\Forms\Controls\MultiSelectBox;


/**
 * Multi-select control with fluent attribute support.
 */
class MultiSelect extends MultiSelectBox implements ItemsControl
{
	use FluentAttributes;
}
