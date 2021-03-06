<?php

namespace app\modules\post\models;

use Yii;
use yii\base\Theme;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $title
 *
 * @property PostTag[] $postTags
 */
class Tag extends \app\modules\post\models\base\Tag
{
    public static function getAll()
    {
        $result = Tag::find()->all();
        return \yii\helpers\ArrayHelper::map($result,'title','title');
    }
}
