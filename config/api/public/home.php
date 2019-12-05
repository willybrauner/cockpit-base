
<?php

// access this API: http://localhost/michael-ferire/michael-ferire-studio-v01/trunk-back/api/public/home
// infos: https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4

/**
 * Home SingleTons
 */

require __DIR__ . '/../../prepare/prepare.php';

// get current language
$lang = $this->param('lang');

// get current page
$page = cockpit('singletons')->getData('Home', [
    'lang' => $lang
]);

// target gallery
$gallery = $page['Gallery'];

//return prepareGalleryField($gallery);
return [
    "title" => $page["Title"],
    "image" => prepareImageField($page["Image"]),
    "gallery" => prepareGalleryField($page["Gallery"])
];

//return $page["Image"];
//return prepareImageField($page["Image"]);


