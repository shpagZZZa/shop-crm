<?php


namespace App\CRUD;


use App\DTO\BaseDTO;

interface CRUDInterface
{
    /**
     * @param BaseDTO $dto
     * @return BaseDTO
     */
    public function create(BaseDTO $dto): BaseDTO;

    /**
     * @param int $id
     * @param BaseDTO $new
     * @return BaseDTO
     */
    public function update(int $id, BaseDTO $new): BaseDTO;

    /**
     * @param int $id
     * @return BaseDTO|null
     */
    public function read(int $id): ?BaseDTO;

    /**
     * @param array $searchParams
     * @return BaseDTO|null
     */
    public function search(array $searchParams): ?BaseDTO;

    /**
     * @param BaseDTO $dto
     * @return bool
     */
    public function delete(BaseDTO $dto): bool;
}
