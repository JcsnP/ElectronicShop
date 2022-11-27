<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "coupons_type".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $coupons_type_id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $status
 */
class CouponsType extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'coupons_type';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'coupons_type_id',
            'title',
            'description',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coupons_type_id', 'title', 'description', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'coupons_type_id' => 'Coupons Type ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public function getTableSchema()
    {
        return false;
    }
}
