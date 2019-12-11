<?php

/**
 * Request "Works" Collection
 */

require __DIR__ . '/../../models/models.php';

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
        "category" => categoryModel($item['Categories']),

        // gallery
        "gallery" => galleryFieldModel($item['Gallery']),

        // description
        "description" => markdownFieldModel($item['Description'])
    ];

}

return $formatCollection;