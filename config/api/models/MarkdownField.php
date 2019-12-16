<?php

namespace Api\Models;

use Parsedown;

/**
 * Prepare Markown Field
 * Parse with Parsdown
 * @doc: https://parsedown.org/
 * @param $pMarkdownData
 * @return string
 */
class MarkdownField
{
    /**
     * @param $pData
     * @return string|null
     */
    public static function format($pData): ?string
    {
        if (!isset($pData)) return null;
        // init parsdown
        $parseDown = new Parsedown();
        // parse field
        $parseMarkdown = $parseDown->text($pData);
        // return result
        return $parseMarkdown;
    }

}
