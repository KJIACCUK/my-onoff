<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 18.04.2018
 * Time: 8:54
 */

namespace app\models;

use Yii;
use mdm\admin\models\User;
use mdm\admin\models\form\PasswordResetRequest as Password;


class PasswordResetRequest extends Password
{
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                    ['user' => $user,
                        'imagePassword' => 'images/icons/logo-01.png', 'imageLogo' => 'images/icons/logo-01.png',
                        'imageLimit' => 'images/icons/logo-01.png',
                        'imageMailchimp' => 'images/icons/logo-01.png',
                        'imageCampaign' => 'images/icons/logo-01.png'
                        ])
                    ->setFrom([Yii::$app->params['supportEmail'] => 'Onoff'])
                    ->setTo($this->email)
                    ->setSubject('Сброс пароля | Onoff')
                    ->send();
            }
        }

        return false;
    }

}