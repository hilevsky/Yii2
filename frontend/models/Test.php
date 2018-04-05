<?php
/**
 * Created 05.04.2018 17:53 by E. Hilevsky
 */

namespace frontend\models;

use Yii;


class Test
{
    public static function getNewsList($max)
    {
        $max = intval($max);
        $sql = 'SELECT * FROM news LIMIT '.$max;
        return Yii::$app->db->createCommand($sql)->queryAll();

    }

}