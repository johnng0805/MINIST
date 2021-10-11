<?php

namespace app\models;

use app\core\models\DbModel;

class UserPayment extends DbModel
{
    public int $user_id = 0;
    public string $payment_type = "";
    public string $provider = "";
    public string $account_number = "";
    public string $expiry = "";

    public static function tableName(): string
    {
        return 'user_payment';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'user_id',
            'payment_type',
            'provider',
            'account_number',
            'expiry'
        ];
    }

    public function rules(): array
    {
        return [
            'user_id' => [self::RULE_REQUIRED],
            'payment_type' => [self::RULE_REQUIRED],
            'provider' => [self::RULE_REQUIRED],
            'account_number' => [self::RULE_REQUIRED],
            'expiry' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'payment_type' => 'Payment:',
            'provider' => 'Provider:',
            'account_number' => 'Account number:',
            'expiry' => 'Expiration date:'
        ];
    }
}
