<?php

namespace Api\Controllers;

use Api\Helpers\UtilsHelper;
use Api\Models\GalleryModel;
use Api\Models\MarkdownModel;
use Api\Models\MetasModel;
use Api\Models\SlugModel;
use Api\Helpers\RequestsHelper;

/**
 * Home SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class HomeController
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Home";

    /**
     * KeyBase API
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @return array|null
     */
    public static function keyBaseAPI(): ?array
    {

        // request singleton with with helper
        $resquest = UtilsHelper::singleTonKeyBaseAPI(
            self::API(),
            "/", // Force slug to be "/" or "/{locale}"
            self::API()["content"]["title"]
        );

        // return result
        return $resquest ?? null;
    }

    /**
     * Return API
     * @return array|null
     */
    public static function API(): ?array
    {
        // request
        $page = RequestsHelper::getSingletons(self::ENDPOINT_NAME);

        // check
        if (!isset($page)) return null;

        // return page endpoint API
        return [
            "content" => [
                // page title
                "title" => $page["title"],
                // slug
                "slug" => SlugModel::format($page['customSlug'], $page['title']),
                // desc
                "description" => MarkdownModel::format($page["description"]),
                // Main Cover return only 1st element of the gallery
                "cover" => GalleryModel::format($page["cover"])[0],
                // gallery
                "gallery" => GalleryModel::format($page["gallery"])
            ],
            //
            "metas" => MetasModel::format($page),
            //
            "config" => [
                "componentName" => $page["componentName"] ?? "HomePage"
            ]
        ];
    }

}


