
<?php
// https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4

require_once __DIR__ . "/../../helpers/ResponsiveImageHelper.php";
$ResponsiveImageHelper = new ResponsiveImageHelper();

// l
$lang = $this->param('lang');

$home = cockpit('singletons')->getData('Home', [
    'lang' => $lang
]);

// target gallery
$gallery = $home['Gallery'];

// si la gallery exist
if(isset($gallery))
{

    $formatGallery = [];

    foreach ($home['Gallery'] as $item)
    {
        $formatGallery[] = $ResponsiveImageHelper->computeImage($item['path']);
    }

    return $formatGallery;
}



return $home;

