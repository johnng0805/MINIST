<?php

class m0008_user_address
{
    public function up()
    {
        $db = app\core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS user_address (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            address_1 VARCHAR(255),
            address_2 VARCHAR(255),
            city VARCHAR(100),
            postal_code VARCHAR(50),
            country VARCHAR(100),
            phone VARCHAR(20),
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id)
        ) ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = app\core\Application::$app->db;
        $sql = "DROP TABLE user_address";
        $db->pdo->exec($sql);
    }
}
