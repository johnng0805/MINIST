<?php

namespace app\models;

use app\core\models\DbModel;

class CartItem extends DbModel
{
    public string $cart_id = "";
    public string $product_id = "";
    public int $quantity = 0;

    public static function tableName(): string
    {
        return "cart_item";
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return ["cart_id", "product_id", "quantity"];
    }

    public function rules(): array
    {
        return [
            "cart_id" => [self::RULE_REQUIRED],
            "product_id" => [self::RULE_REQUIRED],
            "quantity" => [self::RULE_REQUIRED]
        ];
    }

    public function setCartID($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
