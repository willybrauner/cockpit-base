<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/../../helpers/CollectionsHelper.php';

/**
 * Request "Categories" Collection
 */
class Categories extends CollectionsHelper
{
    /**
     * Request endpoint Name
     * @var string
     */
    protected static $requestEndpointName = "Categories";

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
            return categoryModel($pItem);
        };

        // return collection
        return
            static::formatedCollectionRequest($formatedResponse, $pLanguage)
            ?? null;
    }
}


// get optionnal param lang
$lang = $this->param('lang');

// return api
return Categories::API($lang);


