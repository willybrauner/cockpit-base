
<?php

/**
 * Prepare Markown Field
 * Parse with Parsdown
 * @doc: https://parsedown.org/
 * @param $pMarkdownData
 * @return string
 */
function markdownFieldModel ($pMarkdownData) :string
{
    if (!isset($pMarkdownData)) return "";

    // parse field
    $parseMarkdown = Parsedown::instance()->text($pMarkdownData);

    // return result
    return $parseMarkdown;
}
