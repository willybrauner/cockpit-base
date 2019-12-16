<?php

namespace Api\Models;

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
     * compute Image as array of objects
     * @param $pImage
     * @return void|array
     */
    public static function computeImage($pImage)
    {
        // get meta asset id
        // allow to request the root asset field with additional information
        $assetId = isset($pImage['meta']['asset']) ? $pImage['meta']['asset'] : null;

        // get asset field by id
        $rootAssetField = cockpit()->storage->findOne("cockpit/assets", [
            "_id" => $assetId
        ]);

        // if meta title image in the gallery is set
        if (isset($pImage['meta']['title']) && $pImage['meta']['title'] != "")
        {
            // use it
            $alt = $pImage['meta']['title'];
        }
        // else if root asset field title is set
        elseif (isset($rootAssetField['title']) && $rootAssetField['title'] != "")
        {
            // use it
            $alt = $rootAssetField['title'];
        }
        else {
            $alt = null;
        }

        // if meta desc image in the gallery is set
        if (isset ($pImage['meta']['description']) && $pImage['meta']['description'] != "")
        {
            // use it
            $description = $pImage['meta']['description'];
        }
        // else if root desc exist
        elseif (isset($rootAssetField['description']) && $rootAssetField['description'] != "")
        {
            // use it
            $description = $rootAssetField['description'];
        }
        else {
            $description = null;
        }

        // get root asset path
        $path = (isset($rootAssetField['path']) && $rootAssetField['path'] != "")
            ? $rootAssetField['path']
            : null;

        // get root asset colors
        $colors = isset($rootAssetField['colors']) && count($rootAssetField['colors']) > 0
            ? $rootAssetField['colors']
            : null;

        // get root asset tags
        $tags = isset($rootAssetField['tags']) && count($rootAssetField['tags']) > 0
            ? $rootAssetField['tags']
            : null;

        // creat final image object
        $imageObject = [
             //"asset" => $rootAssetField,
            "path" => $path,
            "colors" => $colors,
            "tags" => $tags,
            "alt" => $alt,
            "caption" => $description,
            "_id" => $assetId,
            "data" => []
        ];

        // map each available size
        foreach (ResponsiveImageModel::$sizes as $size) {
            // // check if image exist
            if (!isset($pImage["path"])) return;

            // return thumbnail array
            $url = cockpit('cockpit')->thumbnail([
                'src' => $pImage["path"],
                'mode' => 'fitToWidth',
                'width' => $size
            ]);

            // check if url exist
            if (!isset($url) || $url == "") return;

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


