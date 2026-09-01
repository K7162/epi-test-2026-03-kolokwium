<?php

/**
 * Contact service.
 */

namespace App\Service;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class ContactService.
 */
class ContactService implements ContactServiceInterface
{

    /**
     * Constructor.
     *
     * @param TaskRepository     $taskRepository Task repository
     * @param PaginatorInterface $paginator      Paginator
     */
    public function __construct(private readonly ContactRepository $contactRepository, private readonly PaginatorInterface $paginator)
    {
    }


    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->contactRepository->queryAll(),
            $page,
            ContactRepository::PAGINATOR_ITEMS_PER_PAGE,
            [
                'sortFieldAllowList' => ['contact.id', 'contact.firstName', 'contact.lastName', 'contact.email'],
                'defaultSortFieldName' => 'contact.id',
                'defaultSortDirection' => 'asc',
            ]
        );
    }

    /**
     * Save entity.
     *
     * @param Task $task Task entity
     */
    public function save(Contact $contact): void
    {
        $this->contactRepository->save($contact);
    }
}
