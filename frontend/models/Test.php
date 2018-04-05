<?php
/**
 * Created 05.04.2018 17:53 by E. Hilevsky
 */

namespace frontend\models;

use Yii;
use frontend\components\StringHelper;


class Test
{
    public static function getNewsList($max)
    {
        $max = intval($max);
        $sql = 'SELECT * FROM news LIMIT '.$max;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        $helper = new StringHelper();

        if(!empty($result) && is_array($result)) {

            foreach ($result as &$item) {
                $item['content'] = $helper->getShort($item['content']);
            }
        }

        return $result;

    }

}