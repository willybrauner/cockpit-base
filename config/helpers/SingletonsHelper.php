<?php

class SingletonsHelper
{
    /**
     * Return API with base url as keyName
     * ex: "/en/my-slug": {}
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function keyBaseAPI(?string $pLanguage): ?array
    {
        $request = RequestHelper::getSingletons(static::$requestEndpointName, $pLanguage);

        return [
            APIHelper::baseUrFormat($request, $pLanguage) => static::API($pLanguage),
        ];
    }
}
