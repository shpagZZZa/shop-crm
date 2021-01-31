<?php


namespace App\RequestDTOConverter;


use App\DTO\BaseDTO;
use Symfony\Component\HttpFoundation\Request;

interface RequestDTOConverterInterface
{
    public function convert(Request $request, string $dtoNamespace): BaseDTO;
}
