<?php

namespace Api\Helpers;

/**
 * Class SingletonsHelper
 * @package Api\Helpers
 */
class Singletons
{
    /**
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function keyBaseAPI(?string $pLanguage): ?array
    {
        $request = Requests::getSingletons(static::ENDPOINT_NAME, $pLanguage);

        return [
            Utils::baseUrFormat($request, $pLanguage) => static::API($pLanguage),
        ];
    }
}
