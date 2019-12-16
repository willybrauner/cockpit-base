<?php

use Api\Helpers\Collections;
use Api\Models\BlocksField;
use Api\Models\CategoryField;
use Api\Models\GalleryField;
use Api\Models\MarkdownField;
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
                    "category" => CategoryField::format($pItem['categories']),
                    // gallery
                    "gallery" => GalleryField::format($pItem['gallery']),
                    // description
                    "description" => MarkdownField::format($pItem['description']),
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

// get optionnal param lang
$lang = $this->param('lang');

// return API
return Works::API($lang);



