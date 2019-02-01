<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 14.04.2018
 * Time: 9:22
 *
 * @var $user \app\models\User
 */

use yii\helpers\Html;
?>

<?= 'Приветствуем '.Html::encode($user->username).'.'?>

<?=Html::a('Для смены пароля перейдите по этой ссылке.', Yii::$app->urlManager->createAbsoluteUrl(
    [
    '/mail/reset-password',
    'key'=>$user->secret_key
    ]
))?>
