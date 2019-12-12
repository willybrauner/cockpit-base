<?php

/**
 * Request "Categories" Collection
 */

require __DIR__ . '/../../functions.php';

// get optionnal param lang
$lang = $this->param('lang');


class Categories
{
    /**
     * Request endpoint Name
     * @var string
     */
    public static $requestName = "Categories";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // get specitic collection
        $collection = cockpit('collections')->find(self::$requestName, [
            'lang'=> $pLanguage
        ]);

        if (!isset($collection)) return null;

        // prepare categories
        $formatedCollection = [];

        // map each item
        foreach ( $collection as $item )
        {
            // push in array
            $formatedCollection[] = categoryModel($item);
        }

        // return collection
        return $formatedCollection;
    }
}

return Categories::API($lang);


