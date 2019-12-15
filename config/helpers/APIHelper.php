<?php

class APIHelper
{
    /**
     * return a format string url
     * ex: "/en/page-slug/
     *
     * @param array|null $pRequest
     * @param string|null $pLanguage
     * @return string
     */
    public static function baseUrFormat(?array $pRequest, ?string $pLanguage): string
    {
        // check
        if (!isset($pRequest)) return null;

        // get slug field or slugify title
        $slug = SlugModel::format($pRequest['customSlug'], $pRequest['title']);

        // show language in slug
        $languageSlug = isset($pLanguage) ? "/{$pLanguage}" : "";

        // TODO check if is home Page, in that case, return pLanguage only
        // TODO add request name as extension /works/...

        // retrun format slug
        return "{$languageSlug}/{$slug}";
    }
}
