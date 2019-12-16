<?php

namespace Api\Helpers;

/**
 * @name Requests
 */
class Requests
{
    /**
     * Get singletons
     * @param string|null $pRequestName
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function getSingletons(?string $pRequestName, ?string $pLanguage): ?array
    {
        // check
        if (!isset($pRequestName)) return null;

        // request
        $request = cockpit('singletons')->getData($pRequestName, [
            'lang' => $pLanguage
        ]);

        // return if exist
        return (!isset($request) || !$request) ? null : $request;
    }

    /**
     * Get collections
     * @param string|null $pRequestName
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function getCollections(?string $pRequestName, ?string $pLanguage): ?array
    {
        // check
        if (!isset($pRequestName)) return null;

        // request
        $request = cockpit('collections')->find($pRequestName, [
            'lang' => $pLanguage
        ]);

        // return if exist
        return (!isset($request) || !$request) ? null : $request;
    }

    /**
     * Get all assets
     * @return array
     */
    public static function getAllAssets(): ?array
    {
        // request
        $request = cockpit()->storage->find("cockpit/assets");

        // return if exist
        return (!isset($request) || !$request) ? null : $request;
    }

    /**
     * Get single assets by ID
     * @param $pId
     * @return array
     */
    public static function getSingleAssetById(?int $pId): ?array
    {
        $request = cockpit()->storage->findOne("cockpit/assets", [
            "_id" => $pId
        ]);

        return (!isset($request) || !$request) ? null : $request;
    }

}


