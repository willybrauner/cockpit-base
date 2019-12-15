<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/../../helpers/CollectionsHelper.php';

/**
 * class Articles
 * Request Articles Collection and build custom API
 */
class Articles extends CollectionsHelper
{
    /**
     * Request endpoint Name
     * @var string
     */
    protected static $requestEndpointName = "Articles";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // function return formated array of the response
        $formatedResponse = function ($pItem)
        {
            return [
                "title" => $pItem['Title']
                // Compose your response here...
            ];
        };

        // return collection
        return
            static::formatedCollectionRequest($formatedResponse, $pLanguage)
            ?? null;

    }
}


// get param lang
$lang = $this->param('lang');

// return final API
return Articles::API($lang);



