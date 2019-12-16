<?php

namespace Api\Endpoints;

/**
 * Datas curstom API
 * Return all data page
 */
class Datas
{
    /**
     * Return final Data Api
     * @param $pLanguage
     * @return array
     */
    public static function API(?string $pLanguage): array
    {

        // defines pages
        $pages = array_merge(
            Home::keyBaseAPI($pLanguage),
            // merge each collections in array
            ...Works::keyBaseAPI($pLanguage)
        );

        // defines globals
        $global = [
            "site" => [
                "main" => Site::API($pLanguage)['main'] ?? null,
                "metas" => Site::API($pLanguage)['metas'] ?? null,
                "contact" => Site::API($pLanguage)['contact'] ?? null
            ],
            "menus" => null,
            "languages" => null,
            "categories" => Categories::API($pLanguage) ?? null,
            "dictionary" => Dictionary::API($pLanguage) ?? null,
        ];

        // final API return
        return [
            "pages" => $pages,
            "global" => $global
        ];
    }
}



