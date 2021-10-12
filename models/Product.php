<?php

namespace app\models;

use app\core\models\DbModel;

class Product extends DbModel
{
    public string $name = '';
    public string $feature = '';
    public string $description = '';
    // public string $string_price = '';
    public string $price = '';
    public string $category_id = '';
    public string $vendor_id = '';

    public static function tableName(): string
    {
        return 'product';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'feature', 'description', 'price', 'category_id', 'vendor_id'];
    }

    public function save()
    {
        $this->price = number_format(floatval($this->price), 2, '.', '');
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'feature' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'category_id' => [self::RULE_REQUIRED],
            'vendor_id' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'feature' => 'Feature',
            'description' => 'Description',
            'price' => 'Price'
        ];
    }
}
