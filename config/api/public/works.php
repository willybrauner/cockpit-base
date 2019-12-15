<?php

/**
 * Request Works Collection and build custom API
 * @access /api/public/Works
 */

require_once __DIR__ . '/../../functions.php';



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
        $formatedResponse = function ($pItem)
        {
            return [
                // Title
                "title" => $pItem['Title'],
                // Slug
                "slug" => SlugModel::format($pItem['Slug'], $pItem['Title']),
                // category
                "category" => categoryModel($pItem['Categories']),
                // gallery
                "gallery" => galleryFieldModel($pItem['Gallery']),
                // description
                "description" => markdownFieldModel($pItem['Description']),
                // Blocks
                "blocks" => blocksModel($pItem['Blocks']),
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



