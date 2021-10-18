<?php

class m0010_orders
{
    public function up()
    {
        $db = \app\core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS orders (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            payment_id INT NOT NULL,
            total decimal NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id),
            FOREIGN KEY (payment_id) REFERENCES user_payment(id)
        ) ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;

        $sql = "DROP TABLE order";

        $db->pdo->exec($sql);
    }
}
