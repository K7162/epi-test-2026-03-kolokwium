<?php

/**
 * Contact service interface.
 */

namespace App\Service;

use App\Entity\Contact;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface ContactServiceInterface.
 */
interface ContactServiceInterface
{
    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface;
    /**
     * Save entity.
     *
     * @param Task $task Task entity
     */
    public function save(Contact $contact): void;

}
