<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_products_map extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
            ),
            'user_id' => array(
                    'type' => 'INT',
                    'constraint' => '11'
            ),
            'product_id' => array(
                'type' => 'INT',
                'constraint' => '11'
           ),
           'price' => array(
                'type' => 'INT',
                'constraint' => '5',
                'default'=>'0'
           ),
           'qty' => array(
            'type' => 'INT',
            'constraint' => '11',
           ),
           'is_deleted' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default'=>'0'
           ),
           'created_at datetime default current_timestamp',
           'modified_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table(TBL_PRODUCTS_MAP);

        $this->db->query("ALTER TABLE `products_map` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");
        $this->db->query("ALTER TABLE `products_map` ADD FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");

    }

    public function down()
    {
        $this->dbforge->drop_table(TBL_PRODUCTS_MAP);
    }
}
