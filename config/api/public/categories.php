<?php

/**
 * Request "Categories" Collection
 */

// get optionnal param lang
$lang = $this->param('lang');

// get specitic collection
$collection = cockpit('collections')->find('Categories', [
    'lang'=> $lang
]);

// prepare categories
$categories = [];

foreach ( $collection as $category )
{
    $categories[] = [
        "name" => $category['Name'],
        "description" => $category['Description']
    ];
}

return $categories;
