<?php

/**
 * prepare Category
 * @param array $pCategory
 * @return array
 */
function categoryModel($pCategory)
{
    // check
    if (!isset($pCategory)) return null;

    // get ID
    $id = (string)$pCategory['_id'];

    // request category by id
    $categoryField = cockpit('collections')->findOne('Categories', [
        '_id'=> $id
    ]);

    // format respons
    $formatedCategory = [
        "name" => $categoryField['Name'] ?? null,
        "description" => $categoryField['Description']
            ? markdownFieldModel($categoryField['Description'])
            : null
    ];

    // return result
    return (array)$formatedCategory;
}
