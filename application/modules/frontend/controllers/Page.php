<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
	}
	public function index()
		{
			$data['produk'] = $this->keranjang_model->get_produk_all();
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('shopping/list_produk',$data);
			$this->load->view('themes/footer');
		}
	
	public function cara_bayar()
		{
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('pages/cara_bayar',$data);
			$this->load->view('themes/footer');
		}

		public function hubungi_kami()
		{
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('pages/hubungi_kami',$data);
			$this->load->view('themes/footer');
		}

		public function hubungi_kami_kirim() {
		$tanggal 	= date('Y-m-d');
		$nama 		= $this->input->post('nama');
		$email 		= $this->input->post('email');
		$hp 		= $this->input->post('hp');
		$alamat 	= $this->input->post('alamat');
		$pesan 		= $this->input->post('pesan');

		$this->keranjang_model->InsertHubungiKami($nama,$email,$hp,$alamat,$pesan,$tanggal);

		$this->session->set_flashdata('sukses','Data Berhasil Dikirim');
		redirect("frontend/page/hubungi_kami");
	}

}
