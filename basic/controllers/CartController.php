<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 12.02.2018
 * Time: 10:38
 */

namespace app\controllers;
use app\models\Products;
use app\models\Cart;
use app\models\User;
use Yii;
use app\models\Order;
use app\models\OrderItems;


class CartController extends AppController
{
    /*------------------------------------------------------------------------*/
    public function actionAdd()
    {
        $this->addCart();
        $this -> layout = false;
        return $this->render('cartmodal', compact('session'));
    }

    public function actionAddModal()
    {
        $this->addCart();
        return $this->redirect('/site/catalog');
    }

    public function addCart(){
        $id = Yii::$app->request->get('id');

        $col = (int)Yii::$app->request->get('col');

        $col = !$col ? 1 : $col;

        $product = Products::findOne($id);

        if(empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart ->addToCart($product, $col);
        if(!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

/*-----------------------------------------------------------------------------*/
    public function actionClearSingleCart()
    {
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart ->clearToCart($product);
        if(!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionCountCart(){
        $session = Yii::$app->session;
        $session->open();
        return $session['cart.col'];
    }

    public function actionCountSum(){
        $session = Yii::$app->session;
        $session->open();
        $courses = $this->Kurs();
        return $session['cart.sumeur'] .'EUR | '. round($session['cart.sumeur']*$courses->EUR_out,2) .'BYN | '. round($session['cart.sumeur']*$courses->EUR_out*$courses->RUB_out*10,2) .'RUB';
    }

    /*------------------------------------------------------------------------*/
//    public function actionCountSumByn(){
//        $session = Yii::$app->session;
//        $session->open();
//        return $session['cart.sumeur'];
//    }
//    public function actionCountSumRur(){
//        $session = Yii::$app->session;
//        $session->open();
//        return $session['cart.sumeur'];
//    }
//    public function actionCountSumUsd(){
//        $session = Yii::$app->session;
//        $session->open();
//        return $session['cart.sumeur'];
//    }
    /*------------------------------------------------------------------------*/

    private function clearCartAll(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.col');
        $session->remove('cart.sumeur');
//        $session->remove('cart.sumrur');
//        $session->remove('cart.sumusd');
    }

    private function clearCartSingle($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
    }

    public function actionModalClear(){
        $this->clearCartAll();

        $this->layout = false;
        return $this->render('cartmodal');
    }

    public function actionCartClearAll(){
        $this->clearCartAll();

        return $this->render('shopping-cart');
    }

    public function actionClearModalCartSingle(){
        $id = Yii::$app->request->get('id');
        $this->clearCartSingle($id);
        $session = Yii::$app->session;
        $courses = $this->Kurs();

        $this -> layout = false;
        return $this->render('cartmodal', compact('session', 'courses'));
    }

    public function actionClearCartSingle(){
        $id = Yii::$app->request->get('id');
        $this->clearCartSingle($id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDropCart(){
        $session = Yii::$app->session;
        $session->open();
        $this -> layout = false;

        return $this->render('drop-cart', compact($session));
    }

    public function actionShowModalCart(){
        $session = Yii::$app->session;
        $session->open();
        $this -> layout = false;
        $courses = $this->Kurs();

        return $this->render('cartmodal', compact('session', 'courses'));
    }

    public function actionShoppingCart(){
        $session = Yii::$app->session;
        $session->open();
        $courses = $this->Kurs();

        $order = new Order();
        if(!Yii::$app->user->isGuest){
            $order->user_id = Yii::$app->user->identity->id;
//            $order->name = Yii::$app->user->identity->username;
            $order->email = Yii::$app->user->identity->email;
            $order->unn_unp = Yii::$app->user->identity->unn_unp;
            $order->type_ownership = Yii::$app->user->identity->type_ownership;
            $order->name_ur = Yii::$app->user->identity->name_ur;
        }

        if($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.col'];
            $order->sum_eur = $session['cart.sumeur'];
            $order->sum_byn = round($session['cart.sumeur']*$courses->EUR_out,2);
            $order->sum_rub = round($session['cart.sumeur']*$courses->EUR_out*$courses->RUB_out*10,2);

//            if(!Yii::$app->user->isGuest){
//                $order->user_id = Yii::$app->user->identity->id;
//                $order->name = Yii::$app->user->identity->username;
//                $order->email = Yii::$app->user->identity->email;
//                $order->unn_unp = Yii::$app->user->identity->unn_unp;
//                $order->type_ownership = Yii::$app->user->identity->type_ownership;
//                $order->name_ur = Yii::$app->user->identity->name_ur;
//            }
            if($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id, $courses);
                Yii::$app->session->setFlash('success', '<h5>Ваш заказа №'.$order->id.'<br>Спасибо за оставленный заказ.</h5>');
                /*----------------------------------------*/
                Yii::$app->mailer->compose('order')
                    ->setFrom([Yii::$app->params['supportEmail'] => 'Onoff'])
                    ->setTo('miwa.knx@gmail.com')
                    ->setSubject('Новый заказ | Onoff')
                    ->send();
                /*----------------------------------------*/
                $session->remove('cart');
                $session->remove('cart.col');
                $session->remove('cart.sumeur');
//                $session->remove('cart.sumeur');
//                $session->remove('cart.sumeur');

                return $this->refresh();
            }else
                Yii::$app->session->setFlash('error', 'Произошла ошибка при оформлении заказа!');

        }
        return $this->render('shopping-cart', compact('session','order', 'courses'));
    }

    protected function saveOrderItems($items, $order_id, $courses){
        foreach($items as $id=>$item){
           $order_items = new OrderItems();
           $order_items->order_id = $order_id;
           $order_items->product_id = $id;
           $order_items->name = $item['name'];
//           $order_items->price = $item['price'];
           $order_items->qty_item = $item['col'];
           $order_items->sum_item_eur = $item['col']*$item['eur'];
           $order_items->sum_item_byn = round($item['col']*$item['eur']*$courses->EUR_out,2);
           $order_items->sum_item_rub = round($item['col']*$item['eur']*$courses->EUR_out*$courses->RUB_out*10,2);
           $order_items->eur = $item['eur'];
           $order_items->byn = round($item['eur']*$courses->EUR_out,2);
           $order_items->rub = round($item['eur']*$courses->EUR_out*$courses->RUB_out*10,2);
               $order_items->save();
        }
    }

}