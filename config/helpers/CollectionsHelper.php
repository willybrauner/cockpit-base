
<?php

/**
 * Class CollectionsHelper
 */
class CollectionsHelper
{
    /**
     * Prepare collection request & return the formated collection
     * @param $pFormatedResponse
     * @param string $pLanguage
     * @return array|null
     */
    protected static function formatedCollectionRequest($pFormatedResponse, ?string $pLanguage): ?array
    {
        // request collection
        $collection = RequestHelper::getCollections(static::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatedCollection = [];

        // map all this collection
        foreach ($collection as $item) {
            $formatedCollection[] = (array)$pFormatedResponse($item);
        }

        // return formated collection
        return $formatedCollection;
    }

    /**
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @param $pLanguage
     * @return array|null
     */
    public static function keyBaseAPI(?string $pLanguage): ?array
    {
        // request collection
        $collection = RequestHelper::getCollections(static::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatCollection = [];

        // loop collection
        for ($i = 0; $i < count($collection); $i++)
        {
            // check
            if (!isset($collection[$i]) || !isset(static::API($pLanguage)[$i])) return null;

            // push result in array
            $formatCollection[] = [
                APIHelper::baseUrFormat($collection[$i], $pLanguage) => static::API($pLanguage)[$i]
            ];

        }

        return $formatCollection;
    }


}
