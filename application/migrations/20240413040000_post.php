<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_Post extends CI_Migration { 

    public function up() { 
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'employee_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => TRUE
            ),
            'employee_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'start_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'end_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'reason' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'status'=>array(
                'type'=>'TINYINT',
                'constraint' => '1',
                'default' => '0',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('leave');
        echo "Table 'leave' created successfully.\n";
    }

    public function down() {
        $this->dbforge->drop_table('leave');
        echo "Table 'leave' dropped successfully.\n";
    }
}

?>
