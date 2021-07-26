<?php

namespace app\core\models;

use app\core\Application;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;

    abstract public function attributes(): array;

    abstract static public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
    }

    public static function prepare($sql)
    {
    }
}
