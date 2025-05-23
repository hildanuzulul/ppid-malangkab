-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2025 at 10:03 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppid_malangkab`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi_dikecualikan`
--

CREATE TABLE `informasi_dikecualikan` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `ringkasan` text,
  `pejabat` varchar(255) DEFAULT NULL,
  `penanggung_jawab` varchar(255) DEFAULT NULL,
  `waktu_penerbitan` varchar(100) DEFAULT NULL,
  `bentuk` varchar(100) DEFAULT NULL,
  `jangka_waktu` text,
  `media` varchar(50) DEFAULT NULL,
  `berkas` text,
  `tanggal_unggah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informasi_dikecualikan`
--

INSERT INTO `informasi_dikecualikan` (`id`, `judul`, `ringkasan`, `pejabat`, `penanggung_jawab`, `waktu_penerbitan`, `bentuk`, `jangka_waktu`, `media`, `berkas`, `tanggal_unggah`) VALUES
(1, 'SK Klasifikasi Informasi yang Dikecualikan di Lingkungan Pemerintah Kabupaten Malang', 'SK Klasifikasi Informasi yang Dikecualikan di Lingkungan Pemerintah Kabupaten Malang', '', '', '', 'Soft dan Hard Copy', '', 'icon-info', 'https://drive.google.com/file/d/1A67No0oCpcaI9Nej98UipLWiY3Nck23d/view?usp=sharing', '2023-09-12'),
(2, 'Data Pribadi', 'Nomor HP Pengembang', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'Permanen. Sampai dengan mendapat ijin dari yang bersangkutan. Dikecualikan seterusnya (kecuali atas permintaan pihak berwajib/hukum)', 'icon-info', '', '2023-03-03'),
(3, 'Data Pribadi', 'Data privat perusahaan, Lembaga Pelatihan Kerja, Lembaga Keterampilan dan Pelatihan', 'Kepala Dinas Tenaga Kerja', 'Dinas Tenaga Kerja', '', 'Soft dan Hard Copy', 'Permanen. Atas perintah pengadilan.', 'icon-info', '', '2023-03-03'),
(4, 'Data Pribadi', 'Data wajib pajak. Informasi yang diketahui atau wajib diberikan oleh wajib pajak dalam rangka jabatan/pekerjaan untuk menjalankan perundang-undangan pajak daerah', 'Kepala Badan Pendapatan Daerah', 'Badan Pendapatan Daerah', '', 'Soft dan Hard Copy', 'Selama berlaku', 'icon-info', '', '2023-03-03'),
(5, 'Data Pribadi', 'Hasil test pemeriksaan kesehatan calon jamaah haji', 'Direktur RSUD Kanjuruhan', 'RSUD Kanjuruhan', '', 'Soft dan Hard Copy', 'Apabila mendapat persetujuan yang bersangkutan', 'icon-info', '', '2023-03-03'),
(6, 'Data Pribadi', 'Data dan identitas korban kekerasan perempuan dan anak', 'Kepala Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', '', 'Soft dan Hard Copy', 'Dikecualikan untuk seterusnya (kecuali atas permintaan pihak berwajib/hukum)', 'icon-info', '', '2023-03-03'),
(7, 'Data Pribadi', 'Data pribadi penderita HIV/AIDS dan penyakit pandemik (nama dan alamat)', 'Kepala Dinas Kesehatan', 'Dinas Kesehatan', '', 'Soft dan Hard Copy', 'Apabila mendapat persetujuan yang bersangkutan dan berkepentingan khusus', 'icon-info', '', '2023-03-03'),
(8, 'Data Pribadi', 'Nama dan alamat data Penyandang Masalah Kesejahteraan Sosial yang ada di masyarakat', 'Kepala Dinas Sosial', 'Dinas Sosial', '', 'Soft dan Hard Copy', 'Kecuali ada permintaan khusus (penelitian, penegakan hukum)', 'icon-info', '', '2023-03-03'),
(9, 'Data Pribadi', 'a. Data bekas tahanan politik Gerakan 30 September/Partai Komunis Indonesia;\r\nb. Identitas eks tahanan politik dan narapidana politik.', 'Kepala Dinas Kependudukan dan Pencatatan Sipil', 'Dinas Kependudukan dan Pencatatan Sipil', '', 'Soft dan Hard Copy', 'Permanen', 'icon-info', '', '2023-03-02'),
(10, 'Data dan Dokumentasi Kependudukan', 'a. Data base kependudukan;\r\nb. Data pencarian kerja (AKII);\r\nc. Data pribadi transmigran;\r\nd. Data pribadi Pekerja Migran Indonesia(PMI);\r\ne. Daftar tenaga kerja asing;\r\nf. Data pribadi siswa;\r\ng. Data pribadi guru;\r\nh. Data penghuni dan pemanfaatan rumah susun sewa;\r\ni. Data pribadi pelaku usaha;\r\nj. Data debitur dan bergulir;\r\nk. Data pribadi pemohon ijin;\r\nl. Data penyandang gizi buruk;', 'Kepala Dinas Kependudukan dan Pencatatan Sipil; Dinas Tenaga Kerja; Dinas Pendidikan; Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu; Dinas Kesehatan; Dinas Perumahan, Kawasan Permukiman dan Cipta Karya', 'Dinas Kependudukan dan Pencatatan Sipil; Dinas Tenaga Kerja; Dinas Pendidikan; Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu; Dinas Kesehatan; Dinas Perumahan, Kawasan Permukiman dan Cipta Karya', '', 'Soft dan Hard Copy', 'Permanen. Kecuali mendapat ijin dari yang bersangkutan. Dikecualikan untuk seterusnya kecuali atas permintaan pihak berwajib/hukum', 'icon-info', '', '2023-03-02'),
(11, 'Data Potensi Kerawanan IPOLEKSOSBUD', 'Data Potensi Kerawanan IPOLEKSOSBUD', 'Kepala Badan Kesatuan Bangsa dan Politik', 'Badan Kesatuan Bangsa dan Politik', '', 'Soft dan Hard Copy', '1 (satu) tahun berjalan', 'icon-info', '', '2023-03-02'),
(12, 'Konflik Sosial', 'Data potensi dan penanganan konflik sosial masyarakat', 'Kepala Badan Kesatuan Bangsa dan Politik', 'Badan Kesatuan Bangsa dan Politik', '', 'Soft dan Hard Copy', 'Permanen', 'icon-info', '', '2023-03-02'),
(13, 'Sistem Informasi', 'Sistem Informasi pada Inspektorat Daerah Kabupaten Malang', 'Inspektur Kab. Malang', 'Inspektorat', '', 'Soft Copy', 'Selama masih digunakan', 'icon-info', '', '2023-03-02'),
(14, 'Teknologi Informatika', 'a. Kode akses elektronik aplikasi; b. Sistem keamanan informasi; c. Bandwidth management; d. Internet protokol/IP address private; e. Data perangkat jaringan dan server; f. Data topologi jaringan; g. Data sistem keamanan jaringan; h. Source code aplikasi; i. Data dokumen desain sistem aplikasi; j. Data frekuensi pada setiap website yang dimanfaatkan; k. Database aplikasi sistem informasi user name dan password aplikasi internal Pemda.', 'Kepala Dinas Kominfo', 'Dinas Kominfo', '', 'Soft dan Hard Copy', 'Selama masih digunakan', 'icon-info', '', '2023-03-02'),
(15, 'Data dan Informasi Persandian', 'a. Data materiil sandi; b. Data alat pendukung utama persandian.', 'Kepala Dinas Kominfo', 'Dinas Kominfo', '', 'Soft dan Hard Copy', '30 tahun / selama jangka waktu yang ditetapkan', 'icon-info', '', '2023-03-02'),
(16, 'Data Sanksi Pelaku Usaha', 'Data Sanksi Pelaku Usaha', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'Selama perusahaan masih melakukan kegiatan usaha', 'icon-info', '', '2023-03-02'),
(17, 'Data Perusahaan yang Menjadi Sasaran Pengawasan', 'Data perusahaan yang menjadi sasaran pengawasan', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'Selamanya', 'icon-info', '', '2023-03-02'),
(18, 'Lokasi Server Perizinan', 'Lokasi server perizinan', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'Selamanya', 'icon-info', '', '2023-03-02'),
(19, 'Arsip Perizinan', 'Arsip Perizinan', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'Selamanya', 'icon-info', '', '2023-03-02'),
(20, 'Perijinan Dokumen Rekomendasi Perijinan', 'Perijinan Dokumen Rekomendasi Perijinan', 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '', 'Soft dan Hard Copy', 'selama dokumen masih berlaku. Informasi ini hanya dapat diberikan kepada instansi yang berwenang.', 'icon-info', '', '2023-03-02'),
(21, 'Pelaku Usaha', 'a. Struktur skala upah perusahaan; b. Data privat perusahaan; c. Rincian nilai produksi dan distribusi dan Data UMKM Kabupaten Malang.', 'Kepala Dinas Tenaga Kerja; Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu; Dinas Koperasi dan Usaha Mikro', 'Dinas Tenaga Kerja; Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu; Dinas Koperasi dan Usaha Mikro', '', 'Soft dan Hard Copy', 'Tidak terbatas, kecuali dengan izin yang diberikan kepada instansi yang berwenang.', 'icon-info', '', '2023-03-02'),
(22, 'Perlindungan HAKI Inovasi', 'Perlindungan HAKI Informasi yang dilindungi Hak Atas Kekayaan Intelektual', 'Kepala Badan Penelitian dan Pengembangan Daerah', 'Badan Penelitian dan Pengembangan Daerah', '', 'Soft dan Hard Copy', 'Sampai inovasi tersebut menjadi informasi yang bisa dipublikasikan', 'icon-info', '', '2023-03-02'),
(23, 'Penggeledahan Perda', 'a. Jadwal/agenda penggeledahan Perda; b. Identitas pelapor pribadi/badan hukum.', 'Kepala Satuan Polisi Pramong Praja', 'Satuan Polisi Pramong Praja', '', 'Soft dan Hard Copy', 'Sampai dengan selesainya proses penggeledahan dan pengesahan Perda permanen', 'icon-info', '', '2023-03-02'),
(24, 'Pengawasan Hukum', 'a. Identitas para pihak yang bersengketa; b. Dokumen penyelesaian sengketa hubungan industri; c. Data perselisihan.', 'Kepala Dinas Tenaga Kerja', 'Dinas Tenaga Kerja', '', 'Soft Copy', 'Permanen', 'icon-info', '', '2023-03-02'),
(25, 'Pengawasan Masyarakat', 'a. Identitas pelapor dan isi laporan; b. Data pengawasan yang dilaksanakan; c. Dokumen peraturan hubungan industri; d. Whistle Blowing.', 'Kepala Dinas Tenaga Kerja', 'Perangkat Daerah yang menyampaikan layanan pengaduan', '', 'Soft dan Hard Copy', 'Tidak terbatas, kecuali dengan izin yang diberikan kepada instansi yang berwenang.', 'icon-info', '', '2023-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ektp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi_dikecualikan`
--
ALTER TABLE `informasi_dikecualikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi_dikecualikan`
--
ALTER TABLE `informasi_dikecualikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
