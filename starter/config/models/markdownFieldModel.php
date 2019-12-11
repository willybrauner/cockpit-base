
<?php

include __DIR__ . '../../lib/Parsedown.php';

/**
 * Prepare Markown Field
 * Parse with Parsdown
 * @doc: https://parsedown.org/
 * @param $pMarkdownData
 * @return string
 */
function markdownFieldModel ($pMarkdownData)
{
    if (!isset($pMarkdownData)) return null;

    // parse field
    $parseMarkdown = Parsedown::instance()->text($pMarkdownData);

    // return result
    return $parseMarkdown;
}
