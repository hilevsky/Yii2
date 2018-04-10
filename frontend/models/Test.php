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
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        if(!empty($result) && is_array($result)) {

            foreach ($result as &$item) {
                $item['content'] = Yii::$app->stringHelper->getShortWords($item['content']);
            }
        }

        return $result;

    }

    public function getItem($id)
    {
        $id = intval($id);
        $sql = 'SELECT * FROM news WHERE id = '.$id;

        return Yii::$app->db->createCommand($sql)->queryOne();
    }

}