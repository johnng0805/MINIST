<?php

namespace app\models;

use app\core\models\DbModel;

class Cart extends DbModel
{
    public string  $user_id;

    public static function tableName(): string
    {
        return 'cart';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id'];
    }

    public function rules(): array
    {
        return [
            'user_id' => [self::RULE_REQUIRED]
        ];
    }

    public function isCreated($user_id)
    {
        $cartInfo = Cart::findOne(['user_id' => $user_id]);

        if ($cartInfo) {
            return $cartInfo;
        } else {
            return false;
        }
    }
}
