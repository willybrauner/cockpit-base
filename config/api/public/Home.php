<?php

use Api\Models\GalleryField;
use Api\Models\MarkdownField;
use Api\Models\MetasModel;
use Api\Models\SlugModel;
use Api\Helpers\Singletons;
use Api\Helpers\Requests;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Home SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class Home extends Singletons
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Home";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // request
        $page = Requests::getSingletons(self::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($page)) return null;

        // return page endpoint API
        return [
            "datas" => [
                // page title
                "title" => $page["title"],
                // slug
                "slug" => SlugModel::format($page['customSlug'], $page['title']),
                // desc
                "description" => MarkdownField::format($page["description"]),
                // Main Cover return only 1st element of the gallery
                "cover" => GalleryField::format($page["cover"])[0],
                // gallery
                "gallery" => GalleryField::format($page["gallery"])
            ],
            "metas" => MetasModel::format($page)
        ];
    }
}

// get current language
$lang = $this->param('lang');

// return API
return Home::API($lang);


