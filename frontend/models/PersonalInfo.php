<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "personal_info".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $user_id
 * @property mixed $fname
 * @property mixed $lname
 * @property array $address
 * @property mixed $picture
 * @property mixed $phone
 * @property mixed $gender
 */
class PersonalInfo extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'personal_info';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'user_id',
            'fname',
            'lname',
            'address',
            'picture',
            'phone',
            'gender',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fname', 'lname', 'address', 'picture', 'phone', 'gender'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'user_id' => 'User ID',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'address' => 'Address',
            'picture' => 'Picture',
            'phone' => 'Phone',
            'gender' => 'Gender',
        ];
    }

    public function getTableSchema(){
        return false;
    }
}
