<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 18.04.2018
 * Time: 13:18
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PasswordResetRequest;
use app\models\ResetPassword;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;


class UserController extends Controller
{
    public function actionRequestPasswordResetToken()
    {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Проверьте свою электронную почту для получения дальнейших инструкций.');
                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Извините, мы не можем сбросить пароль для отправки по электронной почте.');
            }
        }

        return $this->render('request-password-reset-token', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', '<i class="fa fa-lg fa-check-circle" aria-hidden="true"></i>  Пароль успешно изменен!');
            return $this->redirect('/site/login');
        }
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }
}