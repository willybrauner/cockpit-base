<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/Home.php';
require_once __DIR__ . '/Works.php';
require_once __DIR__ . '/Articles.php';
require_once __DIR__ . '/Categories.php';

/**
 * Datas curstom API
 * Return all data page
 */
class Data
{
    /**
     * @param $pLanguage
     * @return array
     */
    public static function API(?string $pLanguage): array
    {
        return [
            "pages" => static::pagesBuilder($pLanguage),
            "global" => [
                "categories" => Categories::API($pLanguage),
                "config" => [
                    "analytics" => "",
                    "languages" => "",
                ],
                "dictionary" => "",
                "menus" => "",
                "meta" => "",
                "copyright" => "",
            ],
        ];
    }

    /**
     * Build pages array
     * @param string|null $pLanguage
     * @return array|null
     */
    private static function pagesBuilder(?string $pLanguage): ?array
    {
        // merges each pages in the same array
        $pages = array_merge(
            Home::keyBaseAPI($pLanguage),
            // merge each collections in array
            ...Works::keyBaseAPI($pLanguage),
            //
            ...Articles::keyBaseAPI($pLanguage)
        );

        return $pages;
    }
}


// get current language
$lang = $this->param('lang');

// return final build datas API
return Data::API($lang);



