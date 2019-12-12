<?php

/**
 * Class SlugModel
 *
 */
class SlugModel
{
    /**
     * format slug if exist, and title if slug doesn't exist
     * @param $pSlug
     * @param $pTitle
     * @return string|string[]|null
     */
    static public function format(?string $pSlug,?string  $pTitle): ?string
    {
        // check if slug exist
        if (isset($pSlug) && $pSlug != '')
        {
            return SlugModel::slugify( $pSlug );
        }
        // if slug doesn't exist, check if Title exist
        elseif (isset($pTitle) && $pTitle != '')
        {
            return SlugModel::slugify( $pTitle );
        }
        else {
            return null;
        }
    }


    /**
     * Slugify text
     * @param $pText
     * @return string|string[]|null
     */
    static private function slugify(?string $pText): ?string
    {
        // check
        if (!isset($pText)) return null;

        // replace non letter or digits by -
        $pText = preg_replace('~[^\pL\d]+~u', '-', $pText);

        // transliterate (represent sounds with a different alphabet)
        //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $pText = preg_replace('~[^-\w]+~', '', $pText);

        // trim
        $pText = trim($pText, '-');

        // remove duplicate -
        $pText = preg_replace('~-+~', '-', $pText);

        // lowercase
        $pText = strtolower($pText);

        return $pText;
    }
}


