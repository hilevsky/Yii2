<?php
/**
 * Created 10.04.2018 22:45 by E. Hilevsky
 */

namespace console\models;

use Yii;

class Subscribers
{
    public static function getList()
    {
        $sql = 'SELECT * FROM subscriber';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}