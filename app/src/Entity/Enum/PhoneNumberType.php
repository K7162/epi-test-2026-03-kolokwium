<?php

/**
 * Phone number type.
 */

namespace App\Entity\Enum;

/**
 * Enum PhoneNumberType.
 */
enum PhoneNumberType: int
{
    case LANDLINE = 1;
    case MOBILE = 2;

    /**
     * Get the phone number type label.
     *
     * @return string Phone number type label
     */
    public function label(): string
    {
        return match ($this) {
            PhoneNumberType::LANDLINE => 'label.phone_number_type_landline',
            PhoneNumberType::MOBILE => 'label.phone_number_type_mobile',
        };
    }
}
