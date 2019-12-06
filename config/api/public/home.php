
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


$blocks = $page['Blocks'];


/**
 * Prepare block builder
 * @param array $pBlocks
 * @return array
 */
function prepareBlockBuilder(array $pBlocks) :array
{
    // format block array
    $formatBlocks = [];

    // for each blocks
    foreach ($pBlocks as $block)
    {
        // if field type name is "gallery"
        if( $block['field']['type'] === "gallery")
        {
            // push in formatBlocks GalleryBlock => value
            $formatBlocks["GalleryBlock"] = prepareGalleryField($block['value']);
        }
        // if field type name is "gallery"
        if( $block['field']['type'] === "markdown")
        {
            // FIXME - la 2eme fois que l'on pass sur la clef, on écrase sa valeur
            // push in formatBlocks MarkdownBlock => value
            $formatBlocks["MarkdownBlock"] = $block['value'];
        }
    }

    // return this format blocks array
    return $formatBlocks;
}


return [


    "blocks" => prepareBlockBuilder($page['Blocks']),

    // page title
   # "title" => $page["Title"],

    // return only 1st element of the gallery
   # "cover" => prepareGalleryField($page["Cover"])[0],

    // gallery
   # "gallery" => prepareGalleryField($page["Gallery"]),


    //"_" => $page

];


