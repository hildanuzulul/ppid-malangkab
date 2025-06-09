<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	/**
	 * Halaman daftar berita, dengan pagination dan optional search
	 */
	public function index()
	{
		// Ambil parameter GET
		$search = trim($this->input->get('search'));
		$limit  = $this->input->get('limit')  ? (int)$this->input->get('limit')  : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		// Load cache/API berita semua
		$cache_file = APPPATH . 'cache/berita_all.json';
		if (file_exists($cache_file) && time() - filemtime($cache_file) < 3600) {
			$berita_all = json_decode(file_get_contents($cache_file), true);
		} else {
			$url          = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5';
			$response     = @file_get_contents($url);
			$berita_all   = $response ? json_decode($response, true) : [];
			file_put_contents($cache_file, json_encode($berita_all));
		}

		// Filter berdasarkan search (jika ada)
		if ($search !== '') {
			$berita_all = array_filter($berita_all, function ($item) use ($search) {
				return stripos($item['judul_artikel'], $search) !== false
					|| stripos($item['isi_artikel'],    $search) !== false;
			});
			// reindex agar slice bekerja benar
			$berita_all = array_values($berita_all);
		}

		// Hitung total & slice untuk halaman
		$total_rows  = count($berita_all);
		$berita_page = array_slice($berita_all, $offset, $limit);

		// Format URL gambar
		$default_image_url = base_url('assets/img/logo.png');
		foreach ($berita_page as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		// Konfigurasi pagination
		$config['base_url']            = base_url('berita/index');
		$config['total_rows']          = $total_rows;
		$config['per_page']            = $limit;
		$config['page_query_string']   = TRUE;
		$config['query_string_segment'] = 'offset';
		// styling link (sesuaikan CSS Anda)
		$config['full_tag_open']       = '';
		$config['full_tag_close']      = '';
		$config['cur_tag_open']        = '<a href="#" class="current">';
		$config['cur_tag_close']       = '</a>';
		$config['first_link']          = FALSE;
		$config['last_link']           = FALSE;
		$config['next_link']           = FALSE;
		$config['prev_link']           = FALSE;
		$this->pagination->initialize($config);


		// Load sidebar berita terbaru (4 item)
		$sidebar_berita = $this->get_sidebar_berita();

		// Kirim data ke view
		$data = [
			'berita'           => $berita_page,
			'total_rows'       => $total_rows,
			'limit'            => $limit,
			'offset'           => $offset,
			'search'           => $search,
			'pagination_links' => $this->pagination->create_links(),
			'sidebar_berita'   => $sidebar_berita,
		];
    
		// Sidebar Berita Terbaru (4 item)
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar_berita = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar_berita as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		$data['berita'] = $berita_page;
		$data['pagination_links'] = $this->pagination->create_links();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['total_rows'] = $total_rows;
		$data['sidebar_berita'] = $sidebar_berita;

		$this->render('berita', $data);
	}

	/**
	 * Detail satu berita
	 */
	public function detail($id)
	{
		// Load cache berita
		$cache_file = APPPATH . 'cache/berita_all.json';
		if (!file_exists($cache_file)) {
			show_404();
		}
		$berita_all = json_decode(file_get_contents($cache_file), true);

		// Cari berita by ID
		$berita_detail = null;
		foreach ($berita_all as $item) {
			if ($item['id_artikel'] == $id) {
				$berita_detail = $item;
				break;
			}
		}
		// Jika belum ada, fetch via API
		if (!$berita_detail) {
			$url_detail    = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30&id_artikel=' . $id;
			$response_det  = @file_get_contents($url_detail);
			$items         = $response_det ? json_decode($response_det, true) : [];
			foreach ($items as $item) {
				if ($item['id_artikel'] == $id) {
					$berita_detail = $item;
					break;
				}
			}
		}
		if (!$berita_detail) {
			show_404();
		}

		// Format gambar
		$default_image_url = base_url('assets/img/logo.png');
		$berita_detail['gambar'] = !empty($berita_detail['artikel_image_url'])
			? 'https://web-admin.malangkab.go.id/5' . $berita_detail['artikel_image_url']
			: $default_image_url;

		// Load sidebar
		$sidebar_berita = $this->get_sidebar_berita();

		// Tampilkan ke view
		$this->render('detail', [
			'berita'         => $berita_detail,
			'sidebar_berita' => $sidebar_berita,
		]);
	}

	/**
	 * Helper: load dan format sidebar berita terbaru (4 items)
	 */
	private function get_sidebar_berita()
	{
		$url      = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$resp     = @file_get_contents($url);
		$items    = $resp ? json_decode($resp, true) : [];
		$default_image_url = base_url('assets/img/logo.png');

		foreach ($items as &$item) {
			$item['gambar'] = !empty($item['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $item['artikel_image_url']
				: $default_image_url;
		}
		return $items;
	}


	/**
	 * Endpoint untuk AJAX live‐search sidebar berita
	 */
	public function search_json()
	{
		// Ambil kata kunci
		$q = trim($this->input->get('search'));

		// Load daftar sidebar (4 item)
		$items = $this->get_sidebar_berita();

		// Jika ada query, filter berdasarkan judul
		if ($q !== '') {
			$items = array_filter($items, function ($item) use ($q) {
				return stripos($item['judul_artikel'], $q) !== false;
			});
		}

		// Kembalikan sebagai JSON
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(array_values($items));
		exit;

		$data['berita'] = $berita_detail;
		$data['sidebar_berita'] = $sidebar_berita;
		$this->render('detail_berita', $data);

	}
}
