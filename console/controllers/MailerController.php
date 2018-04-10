<?php
/**
 * Created 10.04.2018 21:28 by E. Hilevsky
 */

namespace console\controllers;

use Yii;
use console\models\News;

class MailerController extends \yii\console\Controller
{
    public function actionSend()
    {
        $list = News::getList();
        print_r($list); die;
    }


}