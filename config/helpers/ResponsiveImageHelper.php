<?php


/**
 * @name ResponsiveImageHelper
 * @description Allow to return an array of images objects
 *
 */
class ResponsiveImageHelper {

    /**
     * Sizes list
     */
    private static $sizes = [640, 768, 1024, 1440, 1960];

    /**
     * Return a single image object
     * @param $pImagePath
     * @param $pWidth
     * @return array
     */
    private function generateThumbnail ($pImagePath, $pWidth)
    {
        // config array
        $config = [
            'src' => $pImagePath,
            'mode' => 'fitToWidth',
            'width' => $pWidth
        ];

        // return thumbnail array
        return cockpit('cockpit')->thumbnail($config);
    }

    /**
     * compute Image as array of objects
     * @param $pImagePath
     * @return array
     */
    public function computeImage($pImagePath)
    {
        // define options
        $responsiveImageArray = [];

        // maper les tailles dispo
        foreach ($this::$sizes as $size)
        {
            // get d'un objet image en fonction de sa taille
            $url = $this->generateThumbnail($pImagePath, $size);

            // si l'image existe
            if (isset($url) && $url != '')
            {
                // get image size
                $imageSize = getimagesize((string)$url);

                // define size
                $width = $imageSize[0];
                $height = $imageSize[1];
                $ratio = ($height / $width) * 100;

                // push result in an array
                $responsiveImageArray[] = [
                    'url' => $url,
                    'width' => $width,
                    'height' => $height,
                    'ratio' => $ratio,
                ];
            }
        }

        // return final array
        return $responsiveImageArray;
    }

}


