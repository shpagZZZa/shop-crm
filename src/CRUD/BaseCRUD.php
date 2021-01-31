<?php


namespace App\CRUD;


use App\DTO\BaseDTO;
use Doctrine\ORM\EntityManagerInterface;

abstract class BaseCRUD implements CRUDInterface
{
    protected EntityManagerInterface $em;

    /**
     * BaseCRUD constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @return string
     */
    protected abstract function getEntityNamespace(): string;
}
