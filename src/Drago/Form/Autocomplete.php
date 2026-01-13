<?php

declare(strict_types=1);

namespace Drago\Form;


/**
 * Enum representing the possible values for the HTML `autocomplete` attribute.
 *
 * Used in form fields to improve browser autofill behavior by providing
 * semantic hints about the type of data expected in the input.
 */
enum Autocomplete: string
{
	// User data
	case Username = 'username';
	case CurrentPassword = 'current-password';
	case NewPassword = 'new-password';
	case Email = 'email';

	// Personal info
	case Name = 'name';
	case GivenName = 'given-name';
	case FamilyName = 'family-name';

	// Contact
	case Tel = 'tel';

	// Address
	case StreetAddress = 'street-address';
	case AddressLine1 = 'address-line1';
	case AddressLine2 = 'address-line2';
	case AddressLevel2 = 'address-level2';
	case PostalCode = 'postal-code';
	case Country = 'country';

	// Payment
	case CcName = 'cc-name';
	case CcNumber = 'cc-number';
	case CcExp = 'cc-exp';
	case CcCsc = 'cc-csc';

	// Context (billing/shipping)
	case Shipping = 'shipping';
	case Billing = 'billing';
	case Transaction = 'transaction';

	// Toggle
	case Off = 'off';
}
