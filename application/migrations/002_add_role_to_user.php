<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_role_to_user extends CI_Migration
{

	public function up()
	{
		if (!$this->db->field_exists('role', 'users')) {
			$fields = array(
				'role' => array(
					'type' => "ENUM('user','admin')",
					'null' => FALSE,
					'default' => 'user',
					'after' => 'id' // Meletakkan kolom 'role' setelah kolom 'id'
				)
			);
			$this->dbforge->add_column('users', $fields);
		}else{
			// Jika kolom 'role' sudah ada, kita bisa mengeluarkan pesan atau melakukan tindakan lain
			echo "Kolom 'role' sudah ada di tabel 'users'.";
		}
	}


	public function down()
	{
		if ($this->db->field_exists('role', 'users')) {
			$this->dbforge->drop_column('users', 'role');
		}
	}
}
