<?php
/**
 * Datas curstom API
 * Return all data page
 */

require __DIR__ . '/../../functions.php';
require __DIR__ . '/home.php';
require __DIR__ . '/works.php';
require __DIR__ . '/categories.php';

// get current language
$lang = $this->param('lang');


class Data
{

    /**
     * @param $pLanguage
     * @return array
     */
    public static function API(?string $pLanguage): array
    {
        return [
            "pages" => self::pagesBuilder($pLanguage),
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
            ...Works::keyBaseAPI($pLanguage)
        );

        return $pages;
    }
}

// return final build datas API
return Data::API($lang);



