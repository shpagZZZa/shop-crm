<?php


namespace App\DTO;


use JsonSerializable;

abstract class BaseDTO implements JsonSerializable
{
    public const DTO_TYPE_CLASS_MAP = [
        BaseDTO::SHOP_DTO_TYPE => ShopDTO::class
    ];

    public const SHOP_DTO_TYPE = 'shop_dto_type';

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $result = [];
        foreach ($this as $propertyName => $propertyValue) {
            $result[$propertyName] = $propertyValue instanceof JsonSerializable ? $propertyValue->jsonSerialize() : $propertyValue;
        }
        return $result;
    }
}
