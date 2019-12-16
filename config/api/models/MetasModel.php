<?php

namespace Api\Models;

/**
 * Class MetasModel
 * @package Api\Models
 */
class MetasModel
{
/**
 * Prepare Metas
 * @param $pMetas
 * @return array|null
 */
    public static function format($pMetas): ?array
    {
        // check
        if (!isset($pMetas) || !is_array($pMetas)) return null;

        $title = ($pMetas['metaTitle'] && $pMetas['metaTitle'] != "")
            ? $pMetas['metaTitle']
            : null;

        $description = ($pMetas['metaDescription'] && $pMetas['metaDescription'] != "")
            ? $pMetas['metaDescription']
            : null;

        $image = ($pMetas['metaImage'] && $pMetas['metaImage'] != "")
            ? $pMetas['metaImage']
            : null;

        // compose result
        $result = [
            "title" => $title,
            "description" => $description,
            "image" => $image
        ];

        return $result;
    }
}

