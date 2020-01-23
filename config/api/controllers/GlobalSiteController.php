<?php

namespace Api\Controllers;

use Api\Helpers\RequestsHelper;
use Api\Models\MarkdownModel;
use Api\Models\MetasModel;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Site SingleTons curstom API
 * @access /api/public/Home
 * @infos https://discourse.getcockpit.com/t/how-to-create-custom-api-endpoints/202/4
 */
class GlobalSiteController
{
    /**
     * Request endpoint Name
     * @var string
     */
    const ENDPOINT_NAME = "GlobalSite";

    /**
     * Return API
     * @return array|null
     */
    public static function API(): ?array
    {
        // request
        $page = RequestsHelper::getSingletons(self::ENDPOINT_NAME);

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

