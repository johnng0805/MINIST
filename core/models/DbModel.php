<?php

namespace app\core\models;

use app\core\Application;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;

    abstract public function attributes(): array;

    abstract static public function primaryKey(): string;

    public function getDisplayName()
    {
        return;
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function update($value, $where)
    {
        $tablename = static::tableName();
        $attrWhere = array_keys($where);
        $attrValue = array_keys($value);

        $sqlWhere = implode("AND ", array_map(fn ($attr) => "$attr = :$attr ", $attrWhere));
        $sqlValue = implode(", ", array_map(fn ($attr) => "$attr = :$attr", $attrValue));

        $statement = self::prepare("UPDATE $tablename SET $sqlValue WHERE $sqlWhere");

        foreach ($value as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr ", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function getAll()
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getByID($_id)
    {
        $tableName = static::tableName();
        $attributes = array_keys($_id);
        $sql = implode("AND ", array_map(fn ($attr) => "$attr = :$attr ", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($_id as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
