<?php

namespace app\modules\contact\models;

use Yii;

class Contact extends \app\modules\contact\models\base\Contact
{
    public function getStatusList()
    {
        return [
            0 => Yii::t('app','Not viewed'),
            1 => Yii::t('app','Viewed')
        ];
    }

    public static function getNotViewedCount()
    {
        return self::find()->where(['status' => 0])->count();
    }
}
