<?php

/**
 * Drago Extension
 * Package built on Nette Framework
 */

declare(strict_types=1);

namespace Drago\Form;


class Autocomplete
{
	public const string

		// User data for login and registration
		Username = 'username',
		CurrentPassword = 'current-password',
		NewPassword = 'new-password',
		Email = 'email',

		// Personal information (name)
		Name = 'name',
		GivenName = 'given-name',
		FamilyName = 'family-name',

		// Contact information (phone number)
		Tel = 'tel',

		// Address (for shipping, billing, etc.)
		StreetAddress = 'street-address',
		AddressLine1 = 'address-line1',
		AddressLine2 = 'address-line2',
		AddressLevel2 = 'address-level2',
		PostalCode = 'postal-code',
		Country = 'country',

		// Payment details (credit card)
		CcName = 'cc-name',
		CcNumber = 'cc-number',
		CcExp = 'cc-exp',
		CcCsc = 'cc-csc',

		// Specific information for shipping and billing
		Shipping = 'shipping',
		Billing = 'billing',
		Transaction = 'transaction',

		// Autocomplete toggles
		Off = 'off';
}
