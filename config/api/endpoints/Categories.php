<?php

namespace Api\Endpoints;

use Api\Helpers\Collections;
use Api\Models\CategoryField;

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
            return CategoryField::format($pItem);
        };

        // return collection
        return static::formatedCollectionRequest($formatedResponse, $pLanguage) ?? null;
    }
}

