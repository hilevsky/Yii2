<?php
/**
 * Created 05.04.2018 21:20 by E. Hilevsky
 */

namespace frontend\components;

class StringHelper
{
    public function getShort($string)
    {
        return mb_substr($string, 0, 40);

    }

}