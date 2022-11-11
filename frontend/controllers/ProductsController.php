<?php

namespace frontend\controllers;

use app\models\Cart;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

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
            $cart = Cart::find()->where(['user_id' => (string)Yii::$app->user->identity->id, 'product_id' => $cartModel->product_id])->one();
            // $qty = $cart->quantity;
            // var_dump($cartModel->quantity);
            // exit();
            if (!empty($cart)) {
                $cartModel = Cart::findOne(['_id' => $cart->_id]);
                $cartModel->quantity = (string)((int)$cartModel->quantity + $cartModel->quantity);
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
