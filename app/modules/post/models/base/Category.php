<?php

namespace app\modules\post\models\base;

use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $id
 * @property string $title
 * @property string $created_by
 *
 * @property User $createdBy
 * @property PostCategory[] $postCategories
 */
class Category extends \app\components\Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['category_id' => 'id']);
    }

    public static function getAll()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(),'id','title');
    }

    public static function getCategories()
    {
        $categories = [];
        foreach ((array)self::find()->all() as $k => $v)
        {
            $categories[] = [
                'id' => $v['id'],
                'title' => $v['title'],
                'slug' => $v['slug'],
            ];
        }

        return $categories;
    }
}
