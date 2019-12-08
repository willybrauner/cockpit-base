<?php

/**
 * Request "Works" Collection
 */

require __DIR__ . '/../../prepare/prepare.php';

// get optionnal param lang
$lang = $this->param('lang');

// get specitic collection
$collection = cockpit('collections')->find('Works', [
    'lang'=> $lang
]);

// prepare categories
$formatCollection = [];

// map all this collection
foreach ( $collection as $item )
{

    $formatCollection[] = [

        // Title
        "title" => $item['Title'],

        // Slug
        "slug" => SlugModel::format($item['Slug'], $item['Title']),

        // category
        "category" => prepareCategory($item['Categories']),

        // gallery
        "gallery" => prepareGalleryField($item['Gallery']),

        // description
        "description" => prepareMarkdownField($item['Description'])
    ];

}

return $formatCollection;
