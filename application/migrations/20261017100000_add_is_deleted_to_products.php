<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_is_deleted_to_products extends CI_Migration {

    public function up(){

        $fields = array(
            'is_deleted' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'after' => 'img_prod',
            ),
        );
        
        $this->dbforge->add_column('products', $fields);
    }

    public function down(){
        
        $this->dbforge->drop_column('products', 'is_deleted');
    }
}