<?php

use Api\Helpers\Requests;
use Api\Helpers\Singletons;
use Api\Models\MarkdownModel;
use Api\Models\MetasModel;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Site SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class GlobalSite extends Singletons
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "GlobalSite";

    /**
     * Return API
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function API(?string $pLanguage): ?array
    {
        // request
        $page = Requests::getSingletons(self::ENDPOINT_NAME, $pLanguage);

        // check
        if (!isset($page)) return null;

        // return final endpoint API
        return [

            "main" => [
                "siteName" => $page["siteName"],
                "copyright" => MarkdownModel::format($page["copyright"]),
                "analytics" => $page["analytics"],
            ],
            "metas" => MetasModel::format($page),
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
return GlobalSite::API($lang);


