<?php

namespace Api\Controllers;

/**
 * Datas curstom API
 * Return all data page
 */
class DatasController
{
    /**
     * Return final Data API
     * @return array
     */
    public function API(): array
    {
        // final API return
        return [
            "pages" =>  array_merge(
                HomeController::keyBaseAPI(),
                ...WorksController::keyBaseAPI()
            ),
            "global" => [
                "site" => [
                    "main" => GlobalSiteController::API()['main'] ?? null,
                    "metas" => GlobalSiteController::API()['metas'] ?? null,
                    "contact" => GlobalSiteController::API()['contact'] ?? null,
                ],
                "menus" => null,
                "languages" => null,
                "categories" => CategoriesController::API(),
                "dictionary" => DictionaryController::API(),
            ]
        ];
    }
}
