<?php


namespace App\DTO;


use JsonSerializable;

/**
 * Важно называть класс таким образом: название сущности + DTO, например ShopDTO
 * Class BaseDTO
 * @package App\DTO
 */
abstract class BaseDTO implements JsonSerializable
{
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
