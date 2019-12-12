<?php
/**
 * Home SingleTons curstom API
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 * @access /api/public/home
 */

require __DIR__ . '/../../functions.php';

// get current language
$lang = $this->param('lang');

class Home
{
    /**
     * Request endpoint Name
     * @var string
     */
    public static $requestEndpointName = "Home";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // request
        $page = RequestHelper::getSingletons(self::$requestEndpointName, $pLanguage);

        // check
        if (!isset($page)) return null;

        // return final endpoint API
        return [
            // page title
            "title" => $page["Title"],
            // Slug
            "slug" => SlugModel::format($page['Slug'], $page['Title']),
            // desc
            "description" => markdownFieldModel($page["Description"]),
            // Main Cover return only 1st element of the gallery
            "cover" => galleryFieldModel($page["Cover"])[0],
            // gallery
            "gallery" => galleryFieldModel($page["Gallery"]),
            //"_" => $page
            "categories" => $page["Categories"],
        ];
    }


    /**
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function keyBaseAPI(?string $pLanguage): ?array
    {
        $request = RequestHelper::getSingletons(self::$requestEndpointName, $pLanguage);

        return [
           APIHelper::baseUrFormat($request, $pLanguage) => self::API($pLanguage),
        ];
    }

}


return Home::API($lang);


