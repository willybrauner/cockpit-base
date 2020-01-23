<?php

namespace Api\Controllers;

use Api\Helpers\RequestsHelper;
use Api\Helpers\UtilsHelper;
use Api\Models\BlocksModel;
use Api\Models\CategoryModel;
use Api\Models\GalleryModel;
use Api\Models\MarkdownModel;
use Api\Models\MetasModel;
use Api\Models\SlugModel;


/**
 * Request Works Collection and build custom API
 * @access /api/public/Works
 */
class WorksController
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Works";

    /**
     * function return formated array of the response
     * @param $pPost
     * @return array
     */
    protected static function postFormat($pPost): array
    {
        return [
            "content" => array(
                // title
                "title" => $pPost['title'],
                // slug
                "slug" => SlugModel::format($pPost['customSlug'], $pPost['title']),
                // category
                "category" => CategoryModel::format($pPost['categories']),
                // gallery
                "gallery" => GalleryModel::format($pPost['gallery']),
                // description
                "description" => MarkdownModel::format($pPost['description']),
                // blocks
                "blocks" => BlocksModel::format($pPost['blocks']),
            ),
            // metas
            "metas" => MetasModel::format($pPost),
            // Compose your response here...
            "config" => [
                "slugFolderName" => $pPost["slugFolderName"] ?? "works",
                "componentName" => $pPost["componentName"] ?? "WorkPage",
                "publish" => $pPost["publish"]
            ]
        ];
    }

    /**
     * Return API
     * @return array|null
     */
    public static function API(): ?array
    {
        // request collection
        $request = RequestsHelper::getCollection(self::ENDPOINT_NAME);

        // check
        if (!isset($request)) return null;

        // prepare collection posts array
        $formatedCollection = [];

        // map all this collection
        foreach ($request as $item) {
            $formatedCollection[] = (array)self::postFormat($item);
        }

        // return full collection
        return $formatedCollection ?? null;
    }

    /**
     * CollectionBaseUrlKeyAPI
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @return array|null
     */
    public static function keyBaseAPI(): ?array
    {
        // request with helper
        // NOTE: you can pass here a "fixed slug folder name"
        // ex: /fr/WORKS/my-slug
        $FixedSlugFolderName = null;

        $resquest = UtilsHelper::collectionKeyBaseAPI(self::API(), $FixedSlugFolderName);

        // return result
        return $resquest ?? null;
    }

}


