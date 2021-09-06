<?php

namespace app\models;

use app\core\models\DbModel;

class ProductImage extends DbModel
{
    public string $product_id = '';
    public string $image = '';

    public static function tableName(): string
    {
        return 'product_image';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['product_id', 'image'];
    }

    public function rules(): array
    {
        return [
            'product_id' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
        ];
    }

    public function setImage(string $path)
    {
        $this->image = $path;
    }

    public static function productIDKey()
    {
        return "product_id";
    }
}
