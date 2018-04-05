<?php
/**
 * Created 04.04.2018 22:08 by E. Hilevsky
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\test;


class TestController extends Controller
{
    public function actionIndex()
    {
        $max = Yii::$app->params['maxNewsInList'];

        $list = Test::getNewsList($max);

        return $this->render('index',[
            'list' => $list,
        ]);
    }

    public function actionView($id){

        $item = Test::getItem($id);

        return $this->render('view',[
            'item' => $item
        ]);
    }

}