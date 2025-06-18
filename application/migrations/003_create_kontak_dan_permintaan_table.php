<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_kontak_dan_permintaan_table extends CI_Migration
{

	public function up()
	{
		if (!$this->db->table_exists('kritik_saran')) {
			$this->dbforge->add_field(array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'nama_pengirim' => array(
					'type' => 'VARCHAR',
					'constraint' => '50',
					'null' => FALSE
				),
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => FALSE
				),
				'telepon' => array(
					'type' => 'VARCHAR',
					'constraint' => '20',
					'null' => TRUE
				),
				'pesan' => array(
					'type' => 'TEXT',
					'null' => FALSE
				),
				'created_at' => array(
					'type' => 'TIMESTAMP',
					'null' => FALSE
					// 'default' => 'CURRENT_TIMESTAMP'
				)
			));
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('kritik_saran');
		} else {
			// Jika tabel sudah ada, kita bisa mengeluarkan pesan atau melakukan tindakan lain
			echo "Tabel 'kritik_saran' sudah ada.";
		}
		// --- RESET dbforge sebelum buat tabel kedua ---
		// $this->dbforge->reset();
		if (!$this->db->table_exists('permintaan_informasi')) {
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
					'null' => FALSE
				),
				'permintaan_informasi' => array(
					'type' => 'TEXT',
					'null' => FALSE
				),
				'tujuan_penggunaan' => array(
					'type' => 'TEXT',
					'null' => FALSE
				),
				'cara_memperoleh' => array(
					'type' => 'ENUM("membaca", "melihat/mendengar","mendapat_salinan")',
					'null' => FALSE
				),
				'bentuk_salinan' => array(
					'type' => 'ENUM("hardcopy", "softcopy")',
					'null' => FALSE
				),
				'kirim_salinan' => array(
					'type' => 'ENUM("download", "email", "langsung")',
					'null' => FALSE
				),
				'keterangan' => array(
					'type' => 'ENUM("ditinjau", "disetujui_proses", "ditolak","selesai")',
					'null' => FALSE
				),
				'berkas' => array(
					'type' => 'TEXT',
					'null' => TRUE
				),
				'kirim_berkas'=>array(
					'type' => 'BOOLEAN',
					'null' => TRUE
				),
				'status_dibaca' => array(
					'type' => 'BOOLEAN',
					'null' => FALSE,
					'default' => FALSE
				),
				'updated_at' => array(
					'type' => 'TIMESTAMP',
					'null' => TRUE
				),
				'created_at' => array(
					'type' => 'TIMESTAMP',
					'null' => FALSE
				)
			));
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('permintaan_informasi');

			$this->db->query('ALTER TABLE permintaan_informasi 
                      ADD CONSTRAINT fk_permintaan_user 
                      FOREIGN KEY (user_id) REFERENCES users(id) 
                      ON DELETE CASCADE ON UPDATE CASCADE');
		} else {
			// Jika tabel sudah ada, kita bisa mengeluarkan pesan atau melakukan tindakan lain
			echo "Tabel 'permintaan_informasi' sudah ada.";
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('kritik_saran');
		$this->dbforge->drop_table('permintaan_informasi');
	}
}
