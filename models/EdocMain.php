<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_main}}".
 *
 * @property string $edoc_id
 * @property string $e_id เลขที่รับ
 * @property string $edoc_no_get เลขที่หนังสือ อบ.
 * @property string $edoc_no_sent เลขที่หนังสือส่ง
 * @property string $edoc_no_keep เลขที่หนังสือเก็บ
 * @property string $edoc_date_doc
 * @property string $edoc_date_get
 * @property string $edoc_from
 * @property string $edoc_to
 * @property string $edoc_name
 * @property string $dep_id
 * @property string $edoc_type_id
 * @property string $edoc_status_id
 * @property string $edoc_read_id
 * @property string $path
 * @property string $edoc_important_id ประเภทหนังสือ
 * @property string $e_id_sent หนังสือส่ง
 * @property string $e_id_dud หนังสือภายใน
 * @property string $e_id_radio หนังสือรับวิทยุ
 * @property string $ip_get_sent
 */
class EdocMain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_main}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'required'],
            [['edoc_name', 'path', 'ip_get_sent'], 'string'],
            [['edoc_id', 'dep_id'], 'string', 'max' => 7],
            [['e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'string', 'max' => 6],
            [['edoc_no_get', 'edoc_no_sent', 'edoc_no_keep', 'edoc_from', 'edoc_to'], 'string', 'max' => 50],
            [['edoc_date_doc', 'edoc_date_get'], 'string', 'max' => 10],
            [['edoc_type_id', 'edoc_status_id', 'edoc_read_id', 'edoc_important_id'], 'string', 'max' => 4],
            [['edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'unique', 'targetAttribute' => ['edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_id' => 'Edoc ID',
            'e_id' => 'เลขที่รับ',
            'edoc_no_get' => 'เลขที่หนังสือ อบ.',
            'edoc_no_sent' => 'เลขที่หนังสือส่ง',
            'edoc_no_keep' => 'เลขที่หนังสือเก็บ',
            'edoc_date_doc' => 'Edoc Date Doc',
            'edoc_date_get' => 'Edoc Date Get',
            'edoc_from' => 'Edoc From',
            'edoc_to' => 'Edoc To',
            'edoc_name' => 'Edoc Name',
            'dep_id' => 'Dep ID',
            'edoc_type_id' => 'Edoc Type ID',
            'edoc_status_id' => 'Edoc Status ID',
            'edoc_read_id' => 'Edoc Read ID',
            'path' => 'Path',
            'edoc_important_id' => 'ประเภทหนังสือ',
            'e_id_sent' => 'หนังสือส่ง',
            'e_id_dud' => 'หนังสือภายใน',
            'e_id_radio' => 'หนังสือรับวิทยุ',
            'ip_get_sent' => 'Ip Get Sent',
        ];
    }
}
