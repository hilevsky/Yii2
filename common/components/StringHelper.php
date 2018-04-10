<?php
/**
 * Created 05.04.2018 21:20 by E. Hilevsky
 */

namespace common\components;

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

    public function getShortWords($string, $limit = null)
    {
        if($limit === null){
            $limit = $this->limit;
        }

        $i = 1;
        $shortstr = 0;
        while ($i<=$limit) {
            $shortstr = mb_strpos($string, ' ', $shortstr);
            $shortstr++;
            $i++;
        }

        return mb_substr($string, 0, $shortstr);
    }


}