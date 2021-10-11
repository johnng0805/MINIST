<?php

namespace app\models;

use app\core\Application;
use app\core\models\DbModel;

class UserAddress extends DbModel
{
    public int $user_id = 0;
    public string $address_1 = "";
    public string $address_2 = "";
    public string $city = "";
    public string $postal_code = "";
    public string $country = "";
    public int $phone = 0;

    public static function tableName(): string
    {
        return 'user_address';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'user_id',
            'address_1',
            'address_2',
            'city',
            'postal_code',
            'country',
            'phone'
        ];
    }

    public function save()
    {
        $session = Application::$app->session;
        $this->user_id = $session->get("userID");

        return parent::save();
    }

    public function rules(): array
    {
        return [
            'user_id' => [self::RULE_REQUIRED],
            'address_1' => [self::RULE_REQUIRED],
            'city' => [self::RULE_REQUIRED],
            'postal_code' => [self::RULE_REQUIRED],
            'country' => [self::RULE_REQUIRED],
            'phone' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]]
        ];
    }

    public function labels(): array
    {
        return [
            'address_1' => 'Address 1:',
            'address_2' => 'Address 2:',
            'city' => 'City:',
            'postal_code' => 'Postal code:',
            'country' => 'Country',
            'phone' => 'Phone:'
        ];
    }
}
