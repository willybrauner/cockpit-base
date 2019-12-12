<?php


/**
 * @name RequestHelper
 */
class RequestHelper
{
    /**
     * Get singletons
     * @param string|null $pRequestName
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function getSingletons(?string $pRequestName, ?string $pLanguage): ?array
    {
        if (!$pRequestName) return null;

        return cockpit('singletons')->getData($pRequestName, [
            'lang' => $pLanguage
        ]);
    }

    /**
     * Get collections
     * @param string|null $pRequestName
     * @param string|null $pLanguage
     * @return array|null
     */
    public static function getCollections(?string $pRequestName, ?string $pLanguage): ?array
    {
        if (!$pRequestName) return null;

        return cockpit('collections')->find($pRequestName, [
            'lang' => $pLanguage
        ]);
    }

    /**
     * Get all assets
     * @return array
     */
    public static function getAllAssets(): ?array
    {
        return cockpit()->storage->find("cockpit/assets");
    }

    /**
     * Get single assets by ID
     * @param $pId
     * @return array
     */
    public static function getSingleAssetById(?int $pId): ?array
    {
        return cockpit()->storage->findOne("cockpit/assets", [
            "_id" => $pId
        ]);
    }

}


