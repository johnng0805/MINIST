<?php

class m0011_order_item
{
    public function up()
    {
        $db = \app\core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS order_item (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            order_id INT NOT NULL,
            product_id INT NOT NULL,
            quantity INT NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id),
            FOREIGN KEY (product_id) REFERENCES product(id)
        ) ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;

        $sql = "DROP TABLE order_item";

        $db->pdo->exec($sql);
    }
}
