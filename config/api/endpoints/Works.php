<?php

namespace Api\Endpoints;

use Api\Helpers\Collections;
use Api\Models\blocksField;
use Api\Models\CategoryField;
use Api\Models\GalleryFieldModel;
use Api\Models\MarkdownFieldModel;
use Api\Models\MetasModel;
use Api\Models\SlugModel;

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
                    "category" => CategoryField::format($pItem['categories']),
                    // gallery
                    "gallery" => GalleryFieldModel::format($pItem['gallery']),
                    // description
                    "description" => MarkdownFieldModel::format($pItem['description']),
                    // Blocks
                    "blocks" => BlocksField::format($pItem['blocks']),
                ),

                // metas
                "metas" => MetasModel::format($pItem)
                // Compose your response here...
            ];
        };

        // return collection
        return static::formatedCollectionRequest($formatedResponse, $pLanguage) ?? null;
    }
}



