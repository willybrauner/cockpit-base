<?php

require __DIR__ . "/../models/models.php";

/**
 * Prepare Gallery Field
 * @description Prepare Gallery Field to return Responsive Image List
 * @param $pGallery
 * @return array
 */

function galleryFieldModel ($pGallery)
{
    // if param is not empty
    if(!isset($pGallery)) return null;

    // create format gallery array
    $formatGallery = [];

    // map each images
    foreach ($pGallery as $item)
    {
        // push format responsive image result in array
        $formatGallery[] = isset($item) ? ResponsiveImageModel::computeImage($item) : null;
    }

    // return the formated array
    return $formatGallery;

}
