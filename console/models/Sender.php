<?php
/**
 * Created 10.04.2018 22:58 by E. Hilevsky
 */

namespace console\models;

use Yii;


class Sender
{
    public static function run($subscribers, $newsList)
    {

        foreach ($subscribers as $subscriber) {

            $result = Yii::$app->mailer->compose('/mailer/newslist', [
                'newslist' => $newsList,
            ])
                ->setFrom('e_gilevski@yahoo.com')
                ->setTo($subscriber['email'])
                ->setSubject('Тема сообщения')
                ->send();

            var_dump($result);
        }
    }
}