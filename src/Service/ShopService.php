<?php


namespace App\Service;


use App\CRUD\ShopCRUD;

class ShopService
{
    private ShopCRUD $shopCRUD;

    /**
     * ShopService constructor.
     * @param ShopCRUD $shopCRUD
     */
    public function __construct(ShopCRUD $shopCRUD)
    {
        $this->shopCRUD = $shopCRUD;
    }

    /**
     * @return ShopCRUD
     */
    public function getCRUD(): ShopCRUD
    {
        return $this->shopCRUD;
    }
}
