<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/Home.php';
require_once __DIR__ . '/Works.php';
require_once __DIR__ . '/Dictionnary.php';
require_once __DIR__ . '/Categories.php';
require_once __DIR__ . '/Site.php';

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
        $pages =  array_merge(
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
            "dictionary" => Dictionnary::API($pLanguage) ?? null,
        ];

        // final API return
        return [
            "pages" => $pages,
            "global" => $global
        ];
    }
}


// get current language
$lang = $this->param('lang');

// return final build datas API
return Datas::API($lang);



