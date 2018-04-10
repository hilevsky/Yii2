<?php
/**
 * Created 10.04.2018 19:04 by E. Hilevsky
 */

namespace console\controllers;

use Yii;
use console\models\News;


class MailerController extends \yii\console\Controller
{
    public function actionSend()
    {

        $result = Yii::$app->mailer->compose()
                    ->setFrom('e_gilevski@yahoo.com')
                    ->setTo('e_gilevski@yahoo.com')
                    ->setSubject('Тема сообщения')
                    ->setTextBody('Текст сообщения')
                    ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
                    ->send();


        $list = News::getList();
        print_r($list); die;
    }
}