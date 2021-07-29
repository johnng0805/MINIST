<?php

namespace app\models;

use app\core\models\DbModel;

class User extends DbModel
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $gender = '';
    public string $password = '';
    public string $repassword = '';

    public static function tableName(): string
    {
        return 'user';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName()
    {
        return $this->first_name;
    }

    public function attributes(): array
    {
        return ['first_name', 'last_name', 'email', 'gender', 'password'];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'gender' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'repassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function labels(): array
    {
        return [
            'first_name' => 'First name:',
            'last_name' => 'Last name:',
            'email' => 'Email:',
            'gender' => 'Gender:',
            'password' => 'Password:',
            'repassword' => 'Confirm password:'
        ];
    }
}
