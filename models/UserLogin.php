<?php

namespace app\models;

use app\core\Application;
use app\core\models\Model;

class UserLogin extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'Account with this email doesn not exist.');
            return false;
        } else {
            if (!password_verify($this->password, $user->password)) {
                $this->addError('password', 'Incorrect password.');
                return false;
            }
        }

        return Application::$app->login($user);
    }

    public function labels(): array
    {
        return [
            'email' => 'Email:',
            'password' => 'Password:'
        ];
    }
}
