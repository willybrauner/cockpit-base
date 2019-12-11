<?php
/**
 * Home SingleTons curstom API
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 * @access /api/public/home
 */

require __DIR__ . '/../../models/models.php';

// get current language
$lang = $this->param('lang');

// get current page
$page = cockpit('singletons')->getData('Home', [
    'lang' => $lang
]);

return [
   // page title
    "title" => $page["Title"],

    // Slug
    "slug" => SlugModel::format($page['Slug'], $page['Title']),

    // desc
    "description" => markdownFieldModel($page["Description"]),

    // Main Cover return only 1st element of the gallery
    "cover" => galleryFieldModel($page["Cover"])[0],

    // gallery
    "gallery" => galleryFieldModel($page["Gallery"]),

    //"_" => $page
    "categories" => $page["Categories"],


];


