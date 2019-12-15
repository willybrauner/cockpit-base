<?php

require_once __DIR__ . '/../../functions.php';
require_once __DIR__ . '/../../helpers/SingletonsHelper.php';

/**
 * Site SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class Site extends SingletonsHelper
{
    /**
     * Request endpoint Name
     * @var string
     */
    protected static $requestEndpointName = "Site";

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

            "main" => [
                "siteName" => $page["siteName"],
                "copyright" => markdownFieldModel($page["copyright"]),
                "analytics" => markdownFieldModel($page["analytics"]),
            ],
            "metas" => metasModel($page),
            "contact" => [
                "address" => [
                    "street" => $page["street"],
                    "cp" => $page["cp"],
                    "city" => $page["city"],
                 ],
                "phone" => $page["phone"],
                "mail" => $page["mail"],
            ]
        ];
    }

}

// get current language
$lang = $this->param('lang');

// return API
return Site::API($lang);


