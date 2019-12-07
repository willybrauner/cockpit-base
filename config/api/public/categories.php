<?php

/**
 * Request "Categories" Collection
 */

require __DIR__ . '/../../prepare/prepare.php';

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
        "description" => prepareMarkdownField($category['Description'])
    ];
}

return $categories;
