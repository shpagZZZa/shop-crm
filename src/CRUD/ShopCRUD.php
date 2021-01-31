<?php


namespace App\CRUD;


use App\DTO\BaseDTO;
use App\DTO\ShopDTO;
use App\Entity\Shop;

class ShopCRUD extends BaseCRUD
{
    /**
     * @inheritDoc
     */
    function getEntityNamespace(): string
    {
        return Shop::class;
    }

    /**
     * @param BaseDTO $dto
     * @return ShopDTO
     */
    public function create(BaseDTO $dto): ShopDTO
    {
        /** @var ShopDTO $dto */

        $shop = (new Shop())
            ->setUniqueId(uniqid())
            ->setTitle($dto->getTitle())
            ->setSettings($dto->getSettings())
            ->setBackendUrl($dto->getBackendUrl())
        ;
        $this->em->persist($shop);
        $this->em->flush();
        return $this->createDTO($shop);
    }

    /**
     * @param int $id
     * @param BaseDTO $new
     * @return BaseDTO
     */
    public function update(int $id, BaseDTO $new): BaseDTO
    {
        /** @var ShopDTO $new */

        /** @var Shop $shop */
        $shop = $this->em->getRepository(Shop::class)->find($id);

        if ($title = $new->getTitle()) {
            $shop->setTitle($title);
        }
        if ($settings = $new->getSettings()) {
            $shop->setSettings($settings);
        }
        if ($backendUrl = $new->getBackendUrl()) {
            $shop->setBackendUrl($backendUrl);
        }

        $this->em->persist($shop);
        $this->em->flush();

        return $this->createDTO($shop);
    }

    /**
     * @param int $id
     * @return ShopDTO|null
     */
    public function read(int $id): ?ShopDTO
    {
        /** @var Shop $shopEntity */
        $shopEntity = $this->em->getRepository($this->getEntityNamespace())->find($id);
        return $shopEntity ? $this->createDTO($shopEntity) : null;
    }

    /**
     * @param array $searchParams
     * @return ShopDTO|null
     */
    public function search(array $searchParams): ?ShopDTO
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
     * @param Shop $shop
     * @return ShopDTO
     */
    private function createDTO(Shop $shop): ShopDTO
    {
        return (new ShopDTO())
            ->setUniqueId($shop->getUniqueId())
            ->setTitle($shop->getTitle())
            ->setSettings($shop->getSettings())
            ->setId($shop->getId())
        ;
    }
}
