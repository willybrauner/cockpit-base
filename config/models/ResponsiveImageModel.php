<?php

require __DIR__.'/../helpers/helpers.php';

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
        // get meta asset id
        // allow to request the root asset field with additional information
        $assetId = isset($pImage['meta']['asset'])
            ? $pImage['meta']['asset']
            : null;

        // get asset field by id
        $rootAssetField = assetsHelper::getSingleAssetById($assetId);

        // if meta title image in the gallery is set
        $alt = isset($pImage['meta']['title'])
            // show this title
            ? $pImage['meta']['title']
            // else, show the root title of image (asset folder)
            : $rootAssetField['title'];

        // same
        $description = isset($pImage['meta']['description'])
            ? $pImage['meta']['description']
            : $rootAssetField['description'];

        // get root asset path
        $path = $rootAssetField['path'] ? $rootAssetField['path'] : null;
        // get root asset colors
        $colors = $rootAssetField['colors'] ? $rootAssetField['colors'] : null;
        // get root asset tags
        $tags = $rootAssetField['tags'] ? $rootAssetField['tags'] : null;

        // creat final image object
        $imageObject = [
           // "asset" => $rootAssetField,
            "path" => $path,
            "colors" => $colors,
            "tags" => $tags,
            "alt" => $alt,
            "caption" => $description,
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


