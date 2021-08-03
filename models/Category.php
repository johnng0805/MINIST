<?php

namespace app\models;

use app\core\models\DbModel;

class Category extends DbModel
{
    public string $name = '';
    public string $description = '';

    public static function tableName(): string
    {
        return 'category';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'description'];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'description' => 'Description'
        ];
    }
}
