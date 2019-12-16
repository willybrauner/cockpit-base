<?php

namespace Api\Endpoints;

use Api\Helpers\Requests;
use Api\Helpers\Singletons;
use Api\Models\MarkdownFieldModel;
use Api\Models\MetasModel;

/**
 * Site SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class Site extends Singletons
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "Site";

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
                "copyright" => MarkdownFieldModel::format($page["copyright"]),
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


