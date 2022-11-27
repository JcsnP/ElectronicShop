<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "coupons".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $coupon_id
 * @property mixed $code
 * @property mixed $description
 * @property mixed $minimum_price
 * @property mixed $discount_amount
 * @property mixed $discount_type
 * @property mixed $status
 */
class Coupons extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'coupons';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'coupon_id',
            'code',
            'description',
            'minimum_price',
            'discount_amount',
            'discount_type',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coupon_id', 'code', 'description', 'minimum_price', 'discount_amount', 'discount_type', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'coupon_id' => 'Coupon ID',
            'code' => 'Code',
            'description' => 'Description',
            'minimum_price' => 'Minimum Price',
            'discount_amount' => 'Discount Amount',
            'discount_type' => 'Discount Type',
            'status' => 'Status',
        ];
    }

    public function getTableSchema()
    {
        return false;
    }
}
