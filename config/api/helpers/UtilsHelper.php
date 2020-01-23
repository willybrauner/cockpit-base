<?php

namespace Api\Helpers;

use Api\Models\SlugModel;

class UtilsHelper
{
    /**
     * singleton BaseUrlKeyAPI
     * Return API with base url as keyName
     * ex: "/en/my-slug": { data: ... }
     * @param array|null $pRequest
     * @param string|null $pSlug
     * @param string|null $pTitle
     * @return array|null
     */
    public static function singleTonKeyBaseAPI(?array $pRequest, ?string $pSlug, ?string $pTitle): ?array
    {
        // get current language
        $language = RequestsHelper::getCurrentLanguage();

        // build keyBase utl
        $keyBase = UtilsHelper::baseUrlFormat($pSlug, $pTitle, $language, null);

        // return an array property with keyBase and data as value
        return [
            $keyBase => $pRequest,
        ];
    }

    /**
     * Collection BaseUrlKeyAPI
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @param array|null $pRequest
     * @param string|null $pSlugFolderName
     * @return array|null
     */
    public static function collectionKeyBaseAPI(?array $pRequest, ?string $pSlugFolderName): ?array
    {
        // check
        if (!isset($pRequest)) return null;

        // get current language
        $language = RequestsHelper::getCurrentLanguage();

        // prepare posts array
        $formatCollection = [];

        // for each post in collection
        for ($i = 0; $i < count($pRequest); $i++) {
            // check
            if (!isset($pRequest[$i])) return null;

            // get slug folder name
            $slugFolderName =
                ($pSlugFolderName !== null && isset($pSlugFolderName))
                ? $pSlugFolderName : $pRequest[$i]["config"]["slugFolderName"];

            // build key base url
            // Be carfull to the post structure array on Controller!
            $keyBase = UtilsHelper::baseUrlFormat(
                $pRequest[$i]["content"]["slug"],
                $pRequest[$i]["content"]["title"],
                $language,
                $slugFolderName
            );

            // push post key and value in the array
            $formatCollection[] = [
                $keyBase => $pRequest[$i]
            ];

        }
        // return formated collection
        return $formatCollection;
    }


    /**
     * return a format string url
     * ex: "/en/page-slug/
     * @param string|null $pSlug
     * @param string|null $pTitle
     * @param string|null $pLanguage
     * @param string|null $pFolderName
     * @return string
     */
    public static function baseUrlFormat(?string $pSlug, ?string $pTitle, ?string $pLanguage, ?string $pFolderName): ?string
    {
        // show language in slug
        $locale = isset($pLanguage) ? "/{$pLanguage}" : "";

        // folder name
        $formatFolderName = SlugModel::format($pFolderName, null);
        $folderName = ($formatFolderName !== "" && isset($formatFolderName)) ? "/{$formatFolderName}" : "";


        // get slug field or slugify title
        $slugify = SlugModel::format($pSlug, $pTitle);
        $slug = $slugify !== "" ? "/{$slugify}" : "";

        // check if base
        if ($locale === "" && $slug === "") {
            return "/";
        } else {
            return $locale . $folderName . $slug;
        }

    }


}
