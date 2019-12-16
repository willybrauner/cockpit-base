<?php

// can't use namespace and use, because of the preserved keyword "public"
require_once __DIR__ . DIRECTORY_SEPARATOR . "Home.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "GlobalSite.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "Works.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "Categories.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "Dictionary.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';

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
                "main" => GlobalSite::API($pLanguage)['main'] ?? null,
                "metas" => GlobalSite::API($pLanguage)['metas'] ?? null,
                "contact" => GlobalSite::API($pLanguage)['contact'] ?? null
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

// get current language
$lang = $this->param('lang');

// return final build datas API
return Datas::API($lang);



