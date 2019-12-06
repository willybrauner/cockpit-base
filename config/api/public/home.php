
<?php
/**
 * Home SingleTons
 *
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 * @access http://localhost/cockpit-base/trunk/api/public/home
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


// return prepareGalleryField($gallery);
return [


    "title" => $page["Title"],

    // return only 1st element of the gallery
    "cover" => prepareGalleryField($page["Cover"])[0],

    "gallery" => prepareGalleryField($page["Gallery"]),


    //"_" => $page

];


