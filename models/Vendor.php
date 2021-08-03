<?php

namespace app\models;

use app\core\models\DbModel;

class Vendor extends DbModel
{
    public string $name = '';
    public string $email = '';
    public string $country = '';

    public static function tableName(): string
    {
        return 'vendor';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'email', 'country'];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'country' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'country' => 'Country'
        ];
    }
}
