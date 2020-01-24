<?php

namespace Api\Controllers;

use Api\Helpers\RequestsHelper;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * class Articles
 * Request Articles Collection and build custom API
 */

class DictionaryController
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Dictionary";

    /**
     * Return API
     * @return array|null
     */
    public static function API(): ?array
    {
        // request collection
        $collection = RequestsHelper::getCollection(self::ENDPOINT_NAME);

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





