<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/../../helpers/CollectionsHelper.php';

/**
 * Request Works Collection and build custom API
 * @access /api/public/Works
 */
class Works extends CollectionsHelper
{
    /**
     * Request endpoint Name
     * @var string
     */
    protected static $requestEndpointName = "Works";

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
                "datas" => [
                    // Title
                    "title" => $pItem['title'],
                    // Slug
                    "slug" => SlugModel::format($pItem['customSlug'], $pItem['title']),
                    // category
                    "category" => categoryModel($pItem['categories']),
                    // gallery
                    "gallery" => galleryFieldModel($pItem['gallery']),
                    // description
                    "description" => markdownFieldModel($pItem['description']),
                    // Blocks
                    "blocks" => blocksModel($pItem['blocks']),
                ],

                // metas
                "metas" => metasModel($pItem)
                // Compose your response here...
            ];
        };

        // return collection
        return
            static::formatedCollectionRequest($formatedResponse, $pLanguage)
            ?? null;
    }
}

// get optionnal param lang
$lang = $this->param('lang');

// return API
return Works::API($lang);



