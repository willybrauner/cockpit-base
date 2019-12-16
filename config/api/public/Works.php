<?php

use Api\Helpers\Collections;
use Api\Models\BlocksModel;
use Api\Models\CategoryModel;
use Api\Models\GalleryModel;
use Api\Models\MarkdownModel;
use Api\Models\MetasModel;
use Api\Models\SlugModel;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Request Works Collection and build custom API
 * @access /api/public/Works
 */
class Works extends Collections
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Works";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {

        // function return formated array of the response
        $formatedResponse = function ($pItem) {
            return [
                "datas" => array(
                    // Title
                    "title" => $pItem['title'],
                    // Slug
                    "slug" => SlugModel::format($pItem['customSlug'], $pItem['title']),
                    // category
                    "category" => CategoryModel::format($pItem['categories']),
                    // gallery
                    "gallery" => GalleryModel::format($pItem['gallery']),
                    // description
                    "description" => MarkdownModel::format($pItem['description']),
                    // Blocks
                    "blocks" => BlocksModel::format($pItem['blocks']),
                ),

                // metas
                "metas" => MetasModel::format($pItem),
                // Compose your response here...
                "config" => [
                    "componentName" => $pItem["componentName"] ?? "WorkPage",
                    "publish" => $pItem["publish"]
                ]
            ];
        };

        // return collection
        return static::formatedCollectionRequest($formatedResponse, $pLanguage) ?? null;
    }
}

// get optionnal param lang
$lang = $this->param('lang');

// return API
return Works::API($lang);



