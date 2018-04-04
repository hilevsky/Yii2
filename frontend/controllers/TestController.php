<?php
/**
 * Created 04.04.2018 22:08 by E. Hilevsky
 */

namespace frontend\controllers;

use yii\web\Controller;


class TestController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}