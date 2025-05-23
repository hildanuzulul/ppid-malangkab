<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_visits_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'visit_time' => array(
                'type' => 'DATETIME',
                'null' => FALSE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('visits');
    }

    public function down()
    {
        $this->dbforge->drop_table('visits');
    }
}
