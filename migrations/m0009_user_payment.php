<?php

class m0009_user_payment
{
    public function up()
    {
        $db = \app\core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS user_payment (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            payment_type VARCHAR(20),
            provider VARCHAR(10),
            account_number INT,
            expiry DATE,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id)
        ) ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE user_payment";
        $db->pdo->exec($sql);
    }
}
