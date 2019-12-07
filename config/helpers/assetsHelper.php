<?php


/**
 * @name assetsHelper
 */
class assetsHelper
{
    /**
     * Get all assets
     * @return array
     */
    static function getAllAssets(): array
    {
        return cockpit()->storage->find("cockpit/assets");
    }

    /**
     * Get single assets by ID
     * @param string $pId
     * @return array
     */
    static function getSingleAssetById($pId): array
    {
        // check
        if (!isset($pId)) return [];

        // return if asset exist
        return cockpit()->storage->findOne("cockpit/assets", [
            "_id" => $pId
        ]);
    }


}


