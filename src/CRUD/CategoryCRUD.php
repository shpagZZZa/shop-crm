<?php


namespace App\CRUD;


use App\DTO\BaseDTO;
use App\DTO\CategoryDTO;
use App\Entity\Category;

class CategoryCRUD extends BaseCRUD
{

    /**
     * @return string
     */
    protected function getEntityNamespace(): string
    {
        return Category::class;
    }

    /**
     * @param BaseDTO $dto
     * @return BaseDTO
     */
    public function create(BaseDTO $dto): BaseDTO
    {
        /** @var CategoryDTO $dto  */

//        $category =
        // TODO: Implement create() method.
    }

    /**
     * @param int $id
     * @param BaseDTO $new
     * @return BaseDTO
     */
    public function update(int $id, BaseDTO $new): BaseDTO
    {
        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     * @return BaseDTO|null
     */
    public function read(int $id): ?BaseDTO
    {
        // TODO: Implement read() method.
    }

    /**
     * @param array $searchParams
     * @return BaseDTO|null
     */
    public function search(array $searchParams): ?BaseDTO
    {
        // TODO: Implement search() method.
    }

    /**
     * @param BaseDTO $dto
     * @return bool
     */
    public function delete(BaseDTO $dto): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param Category $category
     * @return CategoryDTO
     */
    private function createDTO(Category $category): CategoryDTO
    {
        $result = (new CategoryDTO())
            ->setDescription($category->getDescription())
            ->setTitle($category->getTitle())
            ->setSubdescription($category->getSubdescription())
            ->setId($category->getId())
        ;
        if ($parent = $category->getParent()) {
            $result->setParentId($parent->getId());
        }
        return $result;
    }
}
