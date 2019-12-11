<?php

/**
 * Prepare block builder
 * @param array $pBlocks
 * @return array
 */
function blocksModel (array $pBlocks) :array
{
    // format block array
    $formatBlocks = [];

    // for each blocks
    foreach ($pBlocks as $block)
    {

        // Define here bocks informations
        $prepareBlocks = [
            "galleryBlock"=> [
                "fieldName" => "gallery",
                "prepare" => galleryFieldModel($block['value'])
            ],
            "markdownBlock"=> [
                "fieldName" => "markdown",
                "prepare" => markdownFieldModel($block['value'])
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
