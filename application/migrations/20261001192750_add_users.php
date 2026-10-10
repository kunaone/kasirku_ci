<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'employee_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'unique' => TRUE,
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unique' => TRUE,
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');

                // ADDING FOREIGN KEY 
                $this->db->query('ALTER TABLE `users` 
                                  ADD CONSTRAINT `fk_users_employees` 
                                  FOREIGN KEY (`employee_id`) 
                                  REFERENCES `employees` (`id`) 
                                  ON DELETE CASCADE ON UPDATE CASCADE;');
        }

        public function down()
        {
                $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
                $this->dbforge->drop_table('users');
                $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
        }
}

?>