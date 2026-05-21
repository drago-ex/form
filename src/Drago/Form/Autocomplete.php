<?php

declare(strict_types=1);

namespace Drago\Form;


/** Enum representing the possible values for the HTML autocomplete attribute. */
enum Autocomplete: string
{
	case Username = 'username';
	case CurrentPassword = 'current-password';
	case NewPassword = 'new-password';
	case Email = 'email';
	case Name = 'name';
	case GivenName = 'given-name';
	case FamilyName = 'family-name';
	case Tel = 'tel';
	case StreetAddress = 'street-address';
	case AddressLine1 = 'address-line1';
	case AddressLine2 = 'address-line2';
	case AddressLevel2 = 'address-level2';
	case PostalCode = 'postal-code';
	case Country = 'country';
	case CcName = 'cc-name';
	case CcNumber = 'cc-number';
	case CcExp = 'cc-exp';
	case CcCsc = 'cc-csc';
	case Shipping = 'shipping';
	case Billing = 'billing';
	case Transaction = 'transaction';
	case Off = 'off';
	case OneTimeCode = 'one-time-code';
}
