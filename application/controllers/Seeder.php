<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Pastikan database aktif
    }

    public function index()
    {
        $this->seed_users();
        echo "Seeder selesai dijalankan.";
    }

    private function seed_users()
    {
        $data = [
            [
				'id'       => 1,
                'nik' => 0000000000000001,
				'nama_lengkap'     => 'Admin User',
				'nama_user'	 => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'email'    => 'admin@example.com',
                'role'     => 'admin',
            ],
        ];

        $this->db->insert_batch('users', $data);
    }
}
