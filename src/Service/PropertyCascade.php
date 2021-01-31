<?php


namespace App\Service;


use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class PropertyCascade
{
    private PropertyInfoExtractor $propertyExtractor;

    /**
     * PropertyCascade constructor.
     */
    public function __construct()
    {
        $this->propertyExtractor = $this->createPropertyInfo();
    }

    /**
     * @return PropertyInfoExtractor
     */
    public function getPropertyExtractor(): PropertyInfoExtractor
    {
        return $this->propertyExtractor;
    }

    /**
     * @return PropertyInfoExtractor
     */
    public function createPropertyInfo(): PropertyInfoExtractor
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
