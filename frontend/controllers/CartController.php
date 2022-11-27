<?php

namespace frontend\controllers;

use app\models\Cart;
use app\models\Coupons;
use app\models\CartSearch;
use app\models\CouponsType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\helpers\Json;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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
     * Lists all Cart models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest)
            $this->redirect(['site/login']);
        else {
            $cart = Cart::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->all();
            // $searchModel = new CartSearch();
            // $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'cart' => $cart,
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Cart model.
     * @param int $_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($_id),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', '_id' => (string) $model->_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($_id)
    {
        $model = $this->findModel($_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', '_id' => (string) $model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($_id)
    {
        $this->findModel($_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $_id ID
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = Cart::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCoupon($code)
    {
        $subTotal = 0;
        $coupon = Coupons::find()->where(['code' => $code, 'status' => '1'])->one();

        // if coupon doesn't exists
        if(!$coupon) {
            Yii::$app->session->setFlash('error', 'Invalid Coupon');
            $this->redirect(['index']);

            return 0;
        }

        // find coupon type
        $coupon_type = CouponsType::find()->where(['coupons_type_id' => $coupon->discount_type])->one();

        // get cart value
        $cart = Cart::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->all();
        foreach($cart as $index => $item) {
            $subTotal += (int)$item->quantity * (int)$item->price;
        }

        // go to cart page if the total price does not reach the coupon minimum price
        if($subTotal < $coupon->minimum_price) {
            $this->redirect(['index']);
            return 0;
        }

        // percentate discount
        if($coupon_type->title == 'Percentage discount') {
            Yii::$app->session->setFlash('success', 'Apply Coupon Success');
            return ($coupon->discount_amount / 100) * $subTotal;
        }

        // normal discout
        Yii::$app->session->setFlash('success', 'Apply Coupon Success');
        return $coupon->discount_amount;
    }

    // test method
    public function actionIndex2()
    {
        // return $code;
        // return $this->redirect(['index']);
        return $this->redirect(['index']);
    }
}
