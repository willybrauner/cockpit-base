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
     * @param $pId
     * @return array
     */
    static function getSingleAssetById($pId): array
    {
        return cockpit()->storage->findOne("cockpit/assets", [
            "_id" => $pId
        ]);
    }


}


