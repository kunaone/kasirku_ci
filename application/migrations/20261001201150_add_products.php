<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_products extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'name_product' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                    ),
                    'sell_price' => array(
                            'type' => 'DECIMAL',
                            'constraint' => '12,2',
                            'default' => 0.00,
                    ),
                    'qty_stock' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => 0,
                    ),
                    'img_prod' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 255,
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
            $this->dbforge->create_table('products');
        }

        public function down()
        {
            $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
            $this->dbforge->drop_table('products');
            $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
        }
}

?>