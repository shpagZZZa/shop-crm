<?php


namespace App\RequestDTOConverter;


use App\DTO\BaseDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class PropertyInfoRequestDTOConverter implements RequestDTOConverterInterface
{
    private PropertyInfoExtractor $propertyInfo;

    public function __construct()
    {
        $this->propertyInfo = $this->createPropertyExtractor();
    }

    public function convert(Request $request, string $dtoNamespace): BaseDTO
    {
        $result = new $dtoNamespace();

        $properties = $this->propertyInfo->getProperties($dtoNamespace);

        $content = json_decode($request->getContent(), true);

        foreach ($properties as $propertyName) {
            if (!isset($content[$propertyName])) {
                continue;
            }
            $method = 'set' . ucfirst($propertyName);
            $result->$method($content[$propertyName]);
        }

        return $result;
    }

    private function createPropertyExtractor(): PropertyInfoExtractor
    {
        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();

        $listExtractors = [$reflectionExtractor];

        $typeExtractors = [$phpDocExtractor, $reflectionExtractor];

        $descriptionExtractors = [$phpDocExtractor];

        $accessExtractors = [$reflectionExtractor];

        $propertyInitializableExtractors = [$reflectionExtractor];

        return new PropertyInfoExtractor(
            $listExtractors,
            $typeExtractors,
            $descriptionExtractors,
            $accessExtractors,
            $propertyInitializableExtractors
        );

    }
}
