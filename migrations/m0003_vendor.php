<?php

class m0003_vendor
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS vendor (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            country varchar(255) NOT NULL
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE vendor";
        $db->pdo->exec($sql);
    }
}
