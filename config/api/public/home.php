
<?php
/**
 * Home SingleTons
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

return [
   // page title
    "title" => $page["Title"],
    // desc
    "description" => prepareMarkdownField($page["Description"]),
    // Main Cover return only 1st element of the gallery
    "cover" => prepareGalleryField($page["Cover"])[0],
    // gallery
    "gallery" => prepareGalleryField($page["Gallery"]),
    // Blocks
    "blocks" => prepareBlockBuilder($page['Blocks']),
    //"_" => $page

];


