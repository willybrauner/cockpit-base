<?php

use Api\Helpers\Collections;
use Api\Models\CategoryModel;

require __DIR__ . '/../../vendor/autoload.php';


/**
 * Request "Categories" Collection
 */
class Categories extends Collections
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Categories";

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
            return CategoryModel::format($pItem);
        };

        // return collection
        return static::formatedCollectionRequest($formatedResponse, $pLanguage) ?? null;
    }
}

// get optionnal param lang
$lang = $this->param('lang');

// return api
return Categories::API($lang);


