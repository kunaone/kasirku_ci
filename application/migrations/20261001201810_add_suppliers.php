<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_suppliers extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'supplier_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                    ),
                    'contact_person' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                            'null' => TRUE,
                    ),
                    'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 20,
                            'null' => TRUE,
                    ),
                    'created_at' => array(
                        'type' => 'DATETIME',
                    ),
                    'updated_at' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE,
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('suppliers');
        }

        public function down()
        {
            $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
            $this->dbforge->drop_table('suppliers');
            $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
        }
}

?>