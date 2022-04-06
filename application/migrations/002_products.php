<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_products extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
            ),
            'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120'
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
           ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
           ),
           'price' => array(
                'type' => 'INT',
                'constraint' => '5',
                'default'=>'0'
           ),
           'is_enabled' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default'=>'1'
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
        $this->dbforge->create_table('products');

        $products = [
          [
               'id'=>NULL,
               'title'=>'Iphone 10',
               'description'=>'Description for Iphone 10',
               'image'=>'iphone-10.jpg',
               'price'=>'245',
          ],
          [
               'id'=>NULL,
               'title'=>'Macbook Pro',
               'description'=>'Description for Macbook Pro',
               'image'=>'iphone-mackbook_pro.jpeg',
               'price'=>'2499',
          ],
          [
               'id'=>NULL,
               'title'=>'Macbook Mini',
               'description'=>'Description for Macbook Mini',
               'image'=>'mackbook_pro.jpeg',
               'price'=>'949',
          ],
          [
               'id'=>NULL,
               'title'=>'Samsung S20',
               'description'=>'Description for Samsung S20',
               'image'=>'s20ultra.jpeg',
               'price'=>'559',
          ],
          [
               'id'=>NULL,
               'title'=>'Xiaomi 12',
               'description'=>'Description for Xiaomi 12',
               'image'=>'12pro.jpeg',
               'price'=>'820',
          ]
        ];

        $this->db->insert_batch(TBL_PRODUCTS,$products);
    }

    public function down()
    {
        $this->dbforge->drop_table(TBL_PRODUCTS);
    }
}
