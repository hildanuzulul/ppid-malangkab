<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com'; // Ganti sesuai provider email kamu
$config['smtp_port'] = 587;
$config['smtp_user'] = 'ppidtes37@gmail.com'; // Ganti dengan email kamu
$config['smtp_pass'] = 'lnyj kosp lgdt itub';      // Gunakan App Password jika Gmail
// $config['google_pass'] = 'ppidtes123';      // Gunakan App Password jika Gmail
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
$config['newline']   = "\r\n";
$config['smtp_crypto'] = 'tls';
