<?php

namespace Api\Endpoints;

use Api\Helpers\Requests;

/**
 * class Articles
 * Request Articles Collection and build custom API
 */
class Dictionary
{
    /**
     * Request endpoint Name
     * @var string
     */
    // TODO refacto en back to Dictionary
    const ENDPOINT_NAME = "Dictionnary";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // request collection
        $collection = Requests::getCollections(self::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatedCollection = [];

        // map all this collection
        foreach ($collection as $item)
        {
            // check
            if (!isset($item['key']) || !isset($item['word'])) return null;

            // merge key words
            $formatedCollection = array_merge($formatedCollection, [
                $item['key'] => $item['word']
            ]);

        }

        // return formated collection
        return $formatedCollection;
    }
}



