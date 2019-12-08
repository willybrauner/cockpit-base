<?php

/**
 * prepare Category
 * @param array $pCategory
 * @return array
 */
function prepareCategory(array $pCategory) :array
{
    // get ID
    $id = (string)$pCategory['_id'];

    // request category by id
    $categoryField = cockpit('collections')->findOne('Categories', [
        '_id'=> $id
    ]);

    // format respons
    $formatedCategory = [
        "name" => $categoryField['Name'],
        "description" => prepareMarkdownField($categoryField['Description'])
    ];

    // return result
    return (array)$formatedCategory;
}