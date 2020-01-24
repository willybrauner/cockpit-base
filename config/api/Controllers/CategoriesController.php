<?php

namespace Api\Controllers;

use Api\Helpers\RequestsHelper;
use Api\Models\CategoryModel;


/**
 * Request "Categories" Collection
 */
class CategoriesController
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Categories";

    /**
     * Return API
     * @return array|null
     */
    public static function API(): ?array
    {
        // request collection
        $collection = RequestsHelper::getCollection(static::ENDPOINT_NAME);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatedCollection = [];

        // map all this collection
        foreach ($collection as $item) {
            $formatedCollection[] = (array)CategoryModel::format($item);
        }

        // return formated collection
        return $formatedCollection;


    }
}
