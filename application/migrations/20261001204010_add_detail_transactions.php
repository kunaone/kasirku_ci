<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_detail_transactions extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'transaction_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'product_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'qty' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'sell_price' => array(
                            'type' => 'DECIMAL',
                            'constraint' => '12,2',
                            'default' => 0.00,
                    ),
                    'subtotal' => array(
                            'type' => 'DECIMAL',
                            'constraint' => '12,2',
                            'default' => 0.00,
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('detail_transactions');

            // ADDING FOREIGN KEY
            $this->db->query('ALTER TABLE `detail_transactions` 
                              ADD CONSTRAINT `fk_dt_transaction` 
                              FOREIGN KEY (`transaction_id`) 
                              REFERENCES `transactions` (`id`) 
                              ON DELETE CASCADE ON UPDATE CASCADE;');
            
            $this->db->query('ALTER TABLE `detail_transactions` 
                              ADD CONSTRAINT `fk_dt_product` 
                              FOREIGN KEY (`product_id`) 
                              REFERENCES `products` (`id`) 
                              ON DELETE RESTRICT ON UPDATE CASCADE;');
        }

        public function down()
        {
            $this->dbforge->drop_table('detail_transactions');
        }
}

?>