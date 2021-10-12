<?php

class m0004_product
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS product (
            id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            feature text NOT NULL,
            description mediumtext NOT NULL,
            price decimal NOT NULL,
            category_id int NOT NULL,
            vendor_id int NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            FOREIGN KEY (category_id) REFERENCES category(id),
            FOREIGN KEY (vendor_id) REFERENCES vendor(id)
          ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE product";
        $db->pdo->exec($sql);
    }
}
