<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coupons;

/**
 * CouponsSearch represents the model behind the search form of `app\models\Coupons`.
 */
class CouponsSearch extends Coupons
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'coupon_id', 'code', 'description', 'minimum_price', 'discount_amount', 'discount_type', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Coupons::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'coupon_id', $this->coupon_id])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'minimum_price', $this->minimum_price])
            ->andFilterWhere(['like', 'discount_amount', $this->discount_amount])
            ->andFilterWhere(['like', 'discount_type', $this->discount_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
