<?php

/**
 * prepare Category
 * @param array $pCategory
 * @return array
 */
function categoryModel($pCategory) :array
{
    // check
    if (!isset($pCategory)) return [];

    // get ID
    $id = (string)$pCategory['_id'];

    // request category by id
    $categoryField = cockpit('collections')->findOne('Categories', [
        '_id'=> $id
    ]);

    // format respons
    $formatedCategory = [
        "name" => $categoryField['Name'],
        "description" => markdownFieldModel($categoryField['Description'])
    ];

    // return result
    return (array)$formatedCategory;
}
