<?php

class m0002_category
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS category (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            modified_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE category";
        $db->pdo->exec($sql);
    }
}
