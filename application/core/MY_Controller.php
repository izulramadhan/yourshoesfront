<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class MY_Controller extends CI_Controller{
 public function __construct(){
 parent::__construct();
 $this->load->model('M_header');
 $this->authenticated(); // Panggil fungsi authenticated
 	}
 public function authenticated(){ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
 if($this->uri->segment(2) != 'Auth' && $this->uri->segment(2) != ''){
 if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
 redirect('Multiuser/Auth'); // Redirect ke halaman login
 	}
 }
 public function render_login($content, $data = NULL){
 $data['judul'] = "Login";
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $this->load->view('template/login/index', $data);
 }
 public function render_register($content, $data = NULL){
 $data['judul'] = "Register";
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $this->load->view('template/register/index', $data);
 }
 public function render_backend($content, $data = NULL){
 $data['kategori'] = $this->M_header->get_kategori_all();
 $data['headernya'] = $this->load->view('templates/header', $data, TRUE);
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $data['footernya'] = $this->load->view('templates/footer', $data, TRUE);
 $this->load->view('templates/index', $data);
 }
}