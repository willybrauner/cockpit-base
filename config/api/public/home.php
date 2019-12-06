
<?php
/**
 * Home SingleTons
 *
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 * @access http://localhost/cockpit-base/trunk/api/public/home
 */

require __DIR__ . '/../../prepare/prepare.php';
require __DIR__ . '/../../helpers/helpers.php';

// get current language
$lang = $this->param('lang');

// get current page
$page = cockpit('singletons')->getData('Home', [
    'lang' => $lang
]);

// target gallery
$gallery = $page['Gallery'];


//$as = cockpit()->storage->findOne("cockpit/assets", [
//     //'sort' => ['created' => 1]
//    "_id" => "5dea862e613739ed29000079"
//]);
//print_r($as);


// return prepareGalleryField($gallery);
return [
    "title" => $page["Title"],
    "cover" => prepareGalleryField($page["Cover"]),
    //"gallery" => prepareGalleryField($page["Gallery"]),
    //"assets" => $page['Asset'],
    //"all" => $page

];


