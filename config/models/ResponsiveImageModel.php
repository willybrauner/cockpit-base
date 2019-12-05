<?php

/**
 * @name ResponsiveImageModel
 * @description Allow to return an array of images objects
 */
class ResponsiveImageModel
{

    /**
     * Sizes list
     */
    private static $sizes = [640, 768, 1024, 1440, 1960];

    /**
     * Return a single image object
     * @param $pImagePath
     * @param $pWidth
     * @return string
     */
    private function generateThumbnail(string $pImagePath, int $pWidth): string
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
     * @param $pImage
     * @return void|array
     */
    public function computeImage($pImage)
    {

        // get meta title
        $title = isset($pImage['meta']['title'])
            ? $pImage['meta']['title']
            : null;

        // get meta caption
        $caption = isset($pImage['meta']['description'])
            ? $pImage['meta']['description']
            : null;

        // creat final image object
        $imageObject = [
            "alt" => $title,
            "caption" => $caption,
            "data" => []
        ];

        // map each available size
        foreach ($this::$sizes as $size)
        {
            // // check if image exist
            if (!isset($pImage["path"])) return;

            // get d'un objet image en fonction de sa taille
            $url = $this->generateThumbnail($pImage["path"], $size);

            // check if url exist
            if (!isset($url)) return;

            // get image size
            $imageSize = getimagesize($url);

            // define size
            $width = $imageSize[0];
            $height = $imageSize[1];
            $ratio = ($height / $width) * 100;

            // push result in an array
            $imageObject['data'][] = [
                'url' => $url,
                'width' => $width,
                'height' => $height,
                'ratio' => $ratio,
            ];
        }

        // return final array
        return $imageObject;
    }

}


