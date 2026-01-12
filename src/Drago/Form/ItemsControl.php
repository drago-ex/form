<?php

declare(strict_types=1);

namespace Drago\Form;


/**
 * Interface for controls with items (Select/MultiSelect).
 */
interface ItemsControl
{
	/** Set the control's items. */
	public function setItems(array $items, bool $useKeys = true);
}
