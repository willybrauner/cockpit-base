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
$formatedCollection = [];

// map each item
foreach ( $collection as $item )
{
    // push in array
    $formatedCollection[] = prepareCategory($item);
}

// return collection
return $formatedCollection;
