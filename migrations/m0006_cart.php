<?php

class m0006_cart
{
    public function up()
    {
        $db = app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS cart (
            id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
            user_id int NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id)
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = app\core\Application::$app->db;
        $sql = "DROP TABLE cart";
        $db->pdo->exec($sql);
    }
}
