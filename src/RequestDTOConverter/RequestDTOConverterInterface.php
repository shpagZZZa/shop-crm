<?php


namespace App\RequestDTOConverter;


use App\DTO\BaseDTO;
use Symfony\Component\HttpFoundation\Request;

/**
 * Конвертирует http-запрос в нужный ДТО
 * Interface RequestDTOConverterInterface
 * @package App\RequestDTOConverter
 */
interface RequestDTOConverterInterface
{
    public function convert(Request $request, string $dtoNamespace): BaseDTO;
}
