<?php
/**
 * Created 04.04.2018 22:08 by E. Hilevsky
 */

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\test;


class TestController extends Controller
{
    public function actionIndex()
    {
        $list = Test::getNewsList();

        return $this->render('index',[
            'list' => $list,
        ]);
    }

}