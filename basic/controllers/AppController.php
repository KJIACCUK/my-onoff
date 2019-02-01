<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 12.02.2018
 * Time: 11:33
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    public function Kurs(){
        $data = file_get_contents(KURS);
        $courses = json_decode($data);
        $courses_usd = $courses[0];
        return $courses_usd;
    }
}