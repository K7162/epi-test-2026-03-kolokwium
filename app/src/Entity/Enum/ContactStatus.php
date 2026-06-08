<?php

/**
 * Contact status.
 */

namespace App\Entity\Enum;

/**
 * Enum ContactStatus.
 */
enum ContactStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;

    /**
     * Get the status label.
     *
     * @return string Status label
     */
    public function label(): string
    {
        return match ($this) {
            ContactStatus::ACTIVE => 'label.active',
            ContactStatus::INACTIVE => 'label.inactive',
        };
    }
}
