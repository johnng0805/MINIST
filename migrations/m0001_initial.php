<?php

class m0001_initial
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS user (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                gender ENUM('Male', 'Female', 'Other'),
                password VARCHAR(255) NOT NULL
        ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE user";
        $db->pdo->exec($sql);
    }
}
