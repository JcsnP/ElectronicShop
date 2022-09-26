<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "type".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $type_id
 * @property mixed $typeName
 * @property mixed $status
 */
class Type extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'type_id',
            'typeName',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'typeName', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'type_id' => 'Type ID',
            'typeName' => 'Type Name',
            'status' => 'Status',
        ];
    }

    public function getTableSchema(){
        return false;
    }
}
