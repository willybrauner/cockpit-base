<?php

namespace Api\Models;

/**
 * Class blocksField
 */
class BlocksField
{
    /**
     * Prepare block builder
     * Example of blocks fields format
     * @param array $pBlocks
     * @return array
     */
    public static function format($pBlocks): ?array
    {
        // check
        if (!isset($pBlocks) || !is_array($pBlocks)) return null;

        // format block array
        $formatBlocks = [];

        // for each blocks
        foreach ($pBlocks as $block) {
            if (!isset($block)) return null;

            // Define here bocks informations
            $prepareBlocks = [
                "galleryBlock" => [
                    "fieldName" => "gallery",
                    "prepare" => $block['value'] ? GalleryField::format($block['value']) : null
                ],
                "markdownBlock" => [
                    "fieldName" => "markdown",
                    "prepare" => $block['value'] ? MarkdownField::format($block['value']) : null
                ],
            ];

            // map each blocks
            foreach ($prepareBlocks as $key => $value) {
                // if field type name is "gallery"
                if ($block['field']['type'] === $value['fieldName']) {
                    // push in formatBlocks the final formated array return by the API
                    $formatBlocks[] = [
                        "type" => $key,
                        "blockData" => $value['prepare']
                    ];
                }
            }
        }

        // return format blocks array
        return $formatBlocks;
    }
}
