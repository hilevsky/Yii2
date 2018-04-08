<?php
/**
 * Created 05.04.2018 21:20 by E. Hilevsky
 */

namespace frontend\components;

use Yii;

class StringHelper
{

    private $limit;

    public function __construct()
    {
        $this->limit = Yii::$app->params['shortTextLimit'];
    }

    public function getShort($string, $limit = null)
    {
        if($limit === null){
            $limit = $this->limit;
        }
        $shortstr = mb_strpos($string, ' ', $limit);

        return mb_substr($string, 0, $shortstr);

    }

}