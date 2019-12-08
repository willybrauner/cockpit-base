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
    static public function format($pSlug, $pTitle): string
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
            return "";
        }
    }


    /**
     *
     * Slugify text
     * @param $text
     * @return string|string[]|null
     */
    static private function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate (represent sounds with a different alphabet)
        //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        return $text;
    }
}


