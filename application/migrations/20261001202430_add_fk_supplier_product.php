<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_fk_supplier_product extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'supplier_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'product_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('fk_supplier_product');

            // ADDING FOREIGN KEY
            $this->db->query('ALTER TABLE `fk_supplier_product` 
                              ADD CONSTRAINT `fk_sp_supplier` 
                              FOREIGN KEY (`supplier_id`) 
                              REFERENCES `suppliers` (`id`) 
                              ON DELETE CASCADE ON UPDATE CASCADE;');

            $this->db->query('ALTER TABLE `fk_supplier_product` 
                              ADD CONSTRAINT `fk_sp_product` 
                              FOREIGN KEY (`product_id`) 
                              REFERENCES `products` (`id`) 
                              ON DELETE CASCADE ON UPDATE CASCADE;');
        }

        public function down()
        {
            $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
            $this->dbforge->drop_table('fk_supplier_product');
            $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
        }
}

?>