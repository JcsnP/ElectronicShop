<?php

namespace frontend\controllers;

use app\models\Cart;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    

    /**
     * Displays a single Products model.
     * @param int $_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {
        $cartModel = new Cart();
        if ($this->request->isPost && $cartModel->load($this->request->post())) {
            $cart = Cart::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->where(['product_id'=>$cartModel->product_id,
            'price'=>$cartModel->price])->one();
            // 'product_id' => 'Product ID',
            // 'price' => 'Price',
            // 'quantity' => 'Quantity',
            // 'user_id' => 'User ID',
            if(!empty($cart)){
                $cartModel = Cart::findOne(['_id'=>$cart->_id]);
                $cartModel->quantity = (String)((int)$cart->quantity + 1) ;
            }
            $cartModel->save();
            return $this->redirect(['cart/index']);
        }
        return $this->render('view', [
            'model' => $this->findModel($_id),
            'product_id' => $_id,
            'cartModel' => $cartModel
        ]);
    }

    protected function findModel($_id)
    {
        if (($model = Products::findOne(['product_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
