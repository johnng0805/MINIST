<?php

class m0005_product_image
{
    public function up()
    {
        $db = app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS product_image (
            id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
            product_id int NOT NULL,
            image text NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (product_id) REFERENCES product(id)
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = app\core\Application::$app->db;
        $sql = "DROP TABLE product_image";
        $db->pdo->exec($sql);
    }
}
