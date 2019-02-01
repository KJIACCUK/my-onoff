<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user mdm\admin\models\User */

$resetLink = Url::to(['user/reset-password','token'=>$user->password_reset_token], true);
?>
    Приветствуем <?= $user->username ?>,

    Перейдите по приведенной ниже ссылке, чтобы сбросить пароль:

<?= $resetLink ?>