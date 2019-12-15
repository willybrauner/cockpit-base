<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/../../helpers/SingletonsHelper.php';

/**
 * Home SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class Home extends SingletonsHelper
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
        $page = RequestHelper::getSingletons(self::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($page)) return null;

        // return final endpoint API
        return [
            "datas" => [
                // page title
                "title" => $page["title"],
                // Slug
                "slug" => SlugModel::format($page['customSlug'], $page['title']),
                // desc
                "description" => markdownFieldModel($page["description"]) ?? null,
                // Main Cover return only 1st element of the gallery
                "cover" => galleryFieldModel($page["cover"])[0],
                // gallery
                "gallery" => galleryFieldModel($page["gallery"]),
            ],
            "metas" => metasModel($page)
        ];
    }

}

// get current language
$lang = $this->param('lang');

// return API
return Home::API($lang);


