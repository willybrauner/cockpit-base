<?php

require __DIR__ . "/../models/models.php";

/**
 * Prepare Gallery Field
 * @description Prepare Gallery Field to return Responsive Image List
 * @param $pGallery
 * @return array
 */

function prepareGalleryField ($pGallery) :array
{
    // instance of our helper
    $ResponsiveImageHelper = new ResponsiveImageModel();

    // if param is not empty
    if(isset($pGallery))
    {
        // create format gallery array
        $formatGallery = [];

        // map of each  gallery image
        foreach ($pGallery as $item)
        {
            // push format responsive image result in array
            $formatGallery[] = $ResponsiveImageHelper->computeImage($item);
        }

        // return the formated array
        return $formatGallery;
        //return $pGallery;
    }
}
