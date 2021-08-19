<?php

class m0007_cart_item
{
    public function up()
    {
        $db = app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS cart_item (
            id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
            cart_id int NOT NULL,
            product_id int NOT NULL,
            quantity int NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (cart_id) REFERENCES cart(id),
            FOREIGN KEY (product_id) REFERENCES product(id)
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = app\core\Application::$app->db;
        $sql = "DROP TABLE cart_item";
        $db->pdo->exec($sql);
    }
}
