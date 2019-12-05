<?php

include __DIR__ . "/../models/models.php";

/**
Image: {
    "path": "/2019/11/20/5dd54cf8aad3aklee2.jpg",
    "title": "klee2.jpg",
    "mime": "image/jpeg",
    "description": "",
    "tags": [],
    "size": 140553,
    "image": true,
    "video": false,
    "audio": false,
    "archive": false,
    "document": false,
    "code": false,
    "created": 1574259960,
    "modified": 1574259960,
    "_by": "5dd54c02333035ed26000207",
    "width": 722,
    "height": 960,
    "colors": [
    "#393038",
    "#c78c57",
    "#934432",
    "#929fa0",
    "#7c8898"
    ],
    "folder": "",
    "_id": "5dd54cf83330353a50000390"
}
 */

/**
 * @param $pImage
 * @return string
 */
function prepareImageField ($pImage)
{
    // instance of our helper
    $ResponsiveImageHelper = new ResponsiveImageModel();

    $imageFormat = [
        "meta" => [
            "title" => $pImage["title"],
            "description" => $pImage["description"],
        ],
        "path" => $pImage["path"]
    ];

    return $ResponsiveImageHelper->computeImage($imageFormat);
}
