<?php

/**
 * Request Works Collection and build custom API
 * @access /api/public/works
 */

require __DIR__ . '/../../functions.php';

// get optionnal param lang
$lang = $this->param('lang');


class Works
{
    /**
     * Request endpoint Name
     * @var string
     */
    public static $requestEndpointName = "Works";

    /**
     * Return API with base url as keyName
     * @param $pLanguage
     * @return array|null
     */
    public static function keyBaseAPI(?string $pLanguage): ?array
    {
        // request collection
        $collection = RequestHelper::getCollections(self::$requestEndpointName, $pLanguage);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatCollection = [];

        // loop collection
        for ($i = 0; $i < count($collection); $i++)
        {
            // check
            if (!isset($collection[$i]) || !isset(self::API($pLanguage)[$i])) return null;

            // push result in array
            $formatCollection[] = [
                APIHelper::baseUrFormat($collection[$i], $pLanguage) => self::API($pLanguage)[$i]
            ];

        }

        return $formatCollection;

    }

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // request collection
        $collection = RequestHelper::getCollections(self::$requestEndpointName, $pLanguage);

        // check
        if (!isset($collection)) return null;

        // prepare categories
        $formatCollection = [];

        // map all this collection
        foreach ($collection as $item) {

            $formatCollection[] = [
                // Title
                "title" => $item['Title'],
                // Slug
                "slug" => SlugModel::format($item['Slug'], $item['Title']),
                // category
                "category" => categoryModel($item['Categories']),
                // gallery
                "gallery" => galleryFieldModel($item['Gallery']),
                // description
                "description" => markdownFieldModel($item['Description']),
                // Blocks
                "blocks" => blocksModel($item['Blocks']),
            ];

        }

        return $formatCollection;
    }
}

return Works::API($lang);



