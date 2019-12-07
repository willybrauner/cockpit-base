
<?php

/**
 * Prepare Markown Field
 * Parse with Parsdown
 * @doc: https://parsedown.org/
 * @param $pMarkdownData
 * @return string
 */
function prepareMarkdownField ($pMarkdownData) :string
{
    // parse field
    $parseMarkdown = Parsedown::instance()->text($pMarkdownData);

    // return result
    return $parseMarkdown;
}
