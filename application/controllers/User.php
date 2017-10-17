<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->session->login==true){
			if ($this->session->tipe=="admin")
				redirect(base_url().'index.php/Admin');
			else
				$this->load->view('guru');
		}
		else
			$this->load->view('sign-in');
	}
	
	public function berita()
	{
		if ($this->session->login==true && $this->session->tipe=="admin"){
			if(isset($upload) && $upload=="success")
				echo "<script>alert('Berhasil dipost')</script>";
			$this->load->view('berita');
		}
		else
			redirect(base_url().'index.php/User');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/User');
	}
	public function login()
	{
		$this->load->view('login');
	}
	
	public function edit($tipe)
	{
		if ($this->session->login==true && $this->session->tipe=="guru"){
			$data["tipe"]=$tipe;
			$this->load->view('Edit',$data);
		}
		else
			redirect(base_url().'index.php/User');
	}
	
	public function upload()
	{
		if ($this->session->login==true && $this->session->tipe=="guru")
			$this->load->view('Upload');
		else
			redirect(base_url().'index.php/User');
	}
	public function hapus()
	{
		if ($this->session->login==true && $this->session->tipe=="guru"){
			$tabel = $this->db->get_where('ebook','uploader="'.$this->session->username.'"');
			$per_page=10;
			$config['base_url'] = base_url().'index.php/User/hapus';
			$config['total_rows'] = $tabel->num_rows();
			$config['per_page'] = $per_page;
			$config['num_links'] = 2;
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['prev_link']='&lt;Prev';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['next_link'] = 'Next&gt;';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="current"><strong>';
			$config['cur_tag_close'] = '</strong></li>';
			$config['first_link'] = 'First&raquo;';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last&raquo;';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			if(is_null($this->uri->segment(3)))
				$dari = 0;
			else
				$dari = ($this->uri->segment(3)-1) * $per_page;
			$data["tabel"]= $this->db->query('SELECT * FROM ebook WHERE uploader="'.$this->session->username.'" LIMIT '.$dari.','.$per_page);
			$this->load->view('hapus',$data);
		}
		else
			redirect(base_url().'index.php/User');
	}
}
