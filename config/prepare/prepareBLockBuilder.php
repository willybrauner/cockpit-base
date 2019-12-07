<?php

/**
 * Prepare block builder
 * @param array $pBlocks
 * @return array
 */
function prepareBlockBuilder (array $pBlocks) :array
{
    // format block array
    $formatBlocks = [];

    // for each blocks
    foreach ($pBlocks as $block)
    {

        // Define here bocls informations
        $prepareBlocks = [
            "GalleryBlock"=> [
                "fieldName" => "gallery",
                "prepare" => prepareGalleryField($block['value'])
            ],
            "MarkdownBlock"=> [
                "fieldName" => "markdown",
                "prepare" => prepareMarkdownField($block['value'])
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
