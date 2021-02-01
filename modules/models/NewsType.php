<?php

namespace app\modules\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "news_type".
 *
 * @property int $id รหัส
 * @property string|null $name ประเภทข่าว
 *
 * @property NewsDocument[] $newsDocuments
 */
class NewsType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'ประเภทข่าว',
        ];
    }

    static function getDropDownList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * Gets query for [[NewsDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsDocuments()
    {
        return $this->hasMany(NewsDocument::className(), ['news_type_id' => 'id']);
    }
}
