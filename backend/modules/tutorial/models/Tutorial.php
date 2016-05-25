<?php

namespace app\modules\tutorial\models;

use Yii;

/**
 * This is the model class for table "{{%tutorial}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property string $description_short
 * @property string $description
 * @property string $preview_url
 * @property integer $status
 * @property string $alias
 * @property integer $sort_order
 * @property integer $date
 * @property integer $views
 */
class Tutorial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tutorial}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'description_short', 'description', 'preview_url', 'status', 'alias', 'sort_order', 'date', 'views'], 'required'],
            [['category_id', 'status', 'sort_order', 'date', 'views'], 'integer'],
            [['description_short', 'description'], 'string'],
            [['title', 'alias'], 'string', 'max' => 128],
            [['preview_url'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Category ID',
            'description_short' => 'Description Short',
            'description' => 'Description',
            'preview_url' => 'Preview Url',
            'status' => 'Status',
            'alias' => 'Alias',
            'sort_order' => 'Sort Order',
            'date' => 'Date',
            'views' => 'Views',
        ];
    }
}
