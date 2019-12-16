<?php

use Api\Helpers\Requests;

require __DIR__ . '/../../vendor/autoload.php';

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
    const ENDPOINT_NAME = "Dictionary";

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

// get param lang
$lang = $this->param('lang');

// return final API
return Dictionary::API($lang);



