<?php

namespace Api\Models;

use Parsedown;

/**
 * class MarkdownField
 */
class MarkdownModel
{
    /**
     * Parse Markown Field with Parsdown
     * @doc: https://parsedown.org
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
