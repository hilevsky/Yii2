<?php
/**
 * Created 10.04.2018 19:04 by E. Hilevsky
 */

namespace console\controllers;

use Yii\helpers\console;
use console\models\News;
use console\models\Subscribers;
use console\models\Sender;


class MailerController extends \yii\console\Controller
{
    public function actionSend()
    {
        $newsList = News::getList();
        $subscribers = Subscribers::getList();

        $count = Sender::run($subscribers, $newsList);

        Console::output("\nEmails sent: {$count}");

    }
}