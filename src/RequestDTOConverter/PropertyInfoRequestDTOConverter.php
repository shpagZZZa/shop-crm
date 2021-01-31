<?php


namespace App\RequestDTOConverter;


use App\DTO\BaseDTO;
use App\Service\PropertyCascade;
use Symfony\Component\HttpFoundation\Request;

class PropertyInfoRequestDTOConverter implements RequestDTOConverterInterface
{
    private PropertyCascade $propertyCascade;

    /**
     * PropertyInfoRequestDTOConverter constructor.
     * @param PropertyCascade $propertyCascade
     */
    public function __construct(PropertyCascade $propertyCascade)
    {
        $this->propertyCascade = $propertyCascade;
    }

    /**
     * @param Request $request
     * @param string $dtoNamespace
     * @return BaseDTO
     */
    public function convert(Request $request, string $dtoNamespace): BaseDTO
    {
        $result = new $dtoNamespace();

        $properties = $this->propertyCascade->getPropertyExtractor()->getProperties($dtoNamespace);

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
}
