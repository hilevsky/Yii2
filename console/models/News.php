<?php
/**
 * Created 10.04.2018 21:20 by E. Hilevsky
 */

namespace console\models;

use Yii;

class News
{
    const STATUS_NOT_SEND = 1;

    public static function getList()
    {
        $sql = 'SELECT * FROM news WHERE status = '.self::STATUS_NOT_SEND;
        $result = Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function prepareList()
    {

    }

}