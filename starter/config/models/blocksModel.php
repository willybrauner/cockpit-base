<?php

/**
 * Prepare block builder
 * Example of blocks fields format
 * @param array $pBlocks
 * @return array
 */
function blocksModel ($pBlocks)
{
    // check
    if (!isset($pBlocks)) return null;

    // format block array
    $formatBlocks = [];

    // for each blocks
    foreach ($pBlocks as $block)
    {
        if (!isset($block)) return null;

        // Define here bocks informations
        $prepareBlocks = [
            "galleryBlock"=> [
                "fieldName" => "gallery",
                "prepare" => $block['value'] ? galleryFieldModel($block['value']) : null
            ],
            "markdownBlock"=> [
                "fieldName" => "markdown",
                "prepare" => $block['value'] ? markdownFieldModel($block['value']) : null
            ],
        ];

        // map each blocks
        foreach ($prepareBlocks as $key => $value)
        {
            // if field type name is "gallery"
            if( $block['field']['type'] === $value['fieldName'])
            {
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
