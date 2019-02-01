<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 12.02.2018
 * Time: 10:40
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $col = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['col'] += $col;
        }else{
            $_SESSION['cart'][$product->id] = [
                'col' => $col,
                'id' => $product->id,
                'name' => $product->name,
//                'price' => $product->byn,
                'eur' => $product->eur,
//                'rur' => $product->eur,
//                'usd' => $product->eur,
                'img' => $product->img
            ];
        }

        $_SESSION['cart.col'] = isset($_SESSION['cart.col']) ? $_SESSION['cart.col'] + $col : $col;
        $_SESSION['cart.sumeur'] = isset($_SESSION['cart.sumeur']) ? $_SESSION['cart.sumeur'] + $col * $product->eur : $col * $product->eur;
//        $_SESSION['cart.sumrur'] = isset($_SESSION['cart.sumrur']) ? $_SESSION['cart.sumrur'] + $col * $product->rur : $col * $product->rur;
//        $_SESSION['cart.sumusd'] = isset($_SESSION['cart.sumusd']) ? $_SESSION['cart.sumusd'] + $col * $product->usd : $col * $product->usd;
    }

    public function clearToCart($product, $col = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            if($_SESSION['cart'][$product->id]['col'] > 0){
                $_SESSION['cart'][$product->id]['col'] -= $col;

                $_SESSION['cart.col'] = isset($_SESSION['cart.col']) ? $_SESSION['cart.col'] - $col : $col;
                $_SESSION['cart.sumeur'] = isset($_SESSION['cart.sumeur']) ? $_SESSION['cart.sumeur'] - $col * $product->eur : $col * $product->eur;
//                $_SESSION['cart.sumrur'] = isset($_SESSION['cart.sumrur']) ? $_SESSION['cart.sumrur'] - $col * $product->rur : $col * $product->rur;
//                $_SESSION['cart.sumusd'] = isset($_SESSION['cart.sumusd']) ? $_SESSION['cart.sumusd'] - $col * $product->usd : $col * $product->usd;
            }
        }
    }

    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])) return false;

        $colMin = $_SESSION['cart'][$id]['col'];
        $sumMinEur = $_SESSION['cart'][$id]['col'] * $_SESSION['cart'][$id]['eur'];
//        $sumMinRur = $_SESSION['cart'][$id]['col'] * $_SESSION['cart'][$id]['rur'];
//        $sumMinUsd = $_SESSION['cart'][$id]['col'] * $_SESSION['cart'][$id]['usd'];

        $_SESSION['cart.col'] -= $colMin;
        $_SESSION['cart.sumeur'] -= $sumMinEur;
//        $_SESSION['cart.sumrur'] -= $sumMinRur;
//        $_SESSION['cart.sumusd'] -= $sumMinUsd;

        unset($_SESSION['cart'][$id]);
    }
}