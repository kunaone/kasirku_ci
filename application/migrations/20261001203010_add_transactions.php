<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_transactions extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'user_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'invoice_no' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'unique' => TRUE,
                    ),
                    'total_harga' => array(
                            'type' => 'DECIMAL',
                            'constraint' => '12,2',
                            'default' => 0.00,
                    ),
                    'transaction_date' => array(
                            'type' => 'DATETIME',
                            'null' => TRUE,
                    ),
                    'created_at' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('transactions');

            // ADDING FOREIGN KEY
            $this->db->query('ALTER TABLE `transactions` 
                              ADD CONSTRAINT `fk_transactions_user` 
                              FOREIGN KEY (`user_id`) 
                              REFERENCES `users` (`id`) 
                              ON DELETE RESTRICT ON UPDATE CASCADE;');
        }

        public function down()
        {
            $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
            $this->dbforge->drop_table('transactions');
            $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
        }
}

?>