<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_users extends CI_Migration {
    public function up() {
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
            ),
            'first_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '30'
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '30'
           ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
           ),
           'user_type' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default'=>'2'
           ),
           'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '64'
           ),
           'verify_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '64'
           ),
           'is_verified' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
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
        $this->dbforge->create_table(TBL_USERS);

       $data = [
               'id'=>NULL,
               'first_name'=>'admin',
               'last_name'=>'admin',
               'email'=>'admin@admin.com',
               'is_verified'=>'1',
               'user_type'=>'1',
               'password'=>'21232f297a57a5a743894a0e4a801fc3'
               ];

      $this->db->insert(TBL_USERS,$data);
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}
