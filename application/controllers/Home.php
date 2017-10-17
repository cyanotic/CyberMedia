<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$tabel = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC");
		$data["berita1"] = $tabel->first_row();
		$data["berita2"] = $tabel->next_row();
		$data["berita3"] = $tabel->next_row();
		$this->load->view('home',$data);
	}
	public function home($tipe)
	{
		$data["passing"] = $tipe;
		$tabel = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC");
		$data["berita1"] = $tabel->first_row();
		$data["berita2"] = $tabel->next_row();
		$data["berita3"] = $tabel->next_row();
		$this->load->view('home1',$data);
	}
	public function berita($id_berita)
	{
		$berita = $this->db->get_where('berita','id_berita="'.$id_berita.'"');
		if($berita->num_rows()==0){
			$data["heading"] = "404 Page Not Found";
			$data["message"] = "The page you requested was not found ";
			$this->load->view('error',$data);
		}
		else{
			$berita = $this->db->get_where('berita','id_berita="'.$id_berita.'"')->row();
			$data["judul"] = $berita->judul;
			$data["berita"] = $berita->berita;
			$data["gambar"] = $berita->gambar;
			$data["list"] = $this->db->query("SELECT * FROM berita LIMIT 10")->result();
			$this->load->view('view-berita',$data);
		}
	}
	public function download()
	{
		$per_page=10;
		$tabel="";
		$config['base_url']="";
		if(is_null($this->uri->segment(3)))
			$dari = 0;
		else
			$dari = ($this->uri->segment(3) - 1) * $per_page;
		
		if(isset($_GET["search"]) && $_GET["by"]=="nama"){
			$search = $_GET["search"];
			$tabel = $this->db->query("SELECT * FROM ebook WHERE nama LIKE '%$search'");
			$data["tabel"]= $this->db->query("SELECT * FROM ebook WHERE nama LIKE '%$search%' LIMIT $dari,$per_page");
			$config['base_url'] = base_url().'index.php/Home/download?search='.$search;
		}
		else if(isset($_GET["search"]) && $_GET["by"]=="kategori"){
			$search = $_GET["search"];
			$tabel = $this->db->query("SELECT * FROM kategori WHERE kategori LIKE '%$search%'");
			$data["tabel"]= $this->db->query("SELECT * FROM ebook WHERE id_ebook IN(SELECT id_ebook FROM kategori WHERE kategori LIKE '%$search%') LIMIT $dari,$per_page");
			$config['base_url'] = base_url().'index.php/Home/download?search='.$search;
		}
		else{
			$tabel = $this->db->get('ebook');
			$data["tabel"]= $this->db->query("SELECT * FROM ebook  LIMIT $dari,$per_page");
			$config['base_url'] = base_url().'index.php/Home/download';
		}
		$config['total_rows'] = $tabel->num_rows();
		$config['per_page'] = $per_page;
		$config['num_links'] = 2;
		$config['use_page_numbers']=TRUE;
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
		$this->pagination->initialize($config);
		$this->load->view('download',$data);
	}
	public function galeri($kategori)
	{
		if($kategori!="ekstrakurikuler" && $kategori!="kerjasama"&& $kategori!="KBM" && $kategori!="prestasi" && $kategori!="study-tour" && $kategori!="workshop"){
			$data["heading"] = "404 Page Not Found";
			$data["message"] = "The page you requested was not found ";
			$this->load->view('error',$data);
		}
		else{
			$tabel = $this->db->get_where('galeri','kategori="'.$kategori.'"');
			$per_page=8;
			$config['base_url'] = base_url().'index.php/Home/galeri/'.$kategori;
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
			if(is_null($this->uri->segment(4)))
				$dari = $tabel->num_rows() - $per_page;
			else
				$dari = $tabel->num_rows() - $this->uri->segment(4)*$per_page;
			if($dari<0) $dari=0;
			$data["tabel"]= $this->db->query('SELECT * FROM galeri WHERE kategori="'.$kategori.'" ORDER BY id_galeri DESC LIMIT '.$dari.','.$per_page);
			$data["passing"] = $kategori;
			if($kategori=="study-tour")
				$data["passing"] = "Study Tour";
			$this->load->view('galeri',$data);
		}
	}
	
	public function viewberita($kategori)
	{
		if($kategori!="kegiatan" && $kategori!="olahraga"&& $kategori!="kbm" && $kategori!="ekstrakurikuler" && $kategori!="all")
		{
			$data["heading"] = "404 Page Not Found";
			$data["message"] = "The page you requested was not found ";
			$this->load->view('error',$data);
		}
		else{
			if ($kategori=="all")
				$tabel = $this->db->get('berita');
			else
				$tabel = $this->db->get_where('berita','kategori="'.$kategori.'"');
			$per_page=5;
			$config['base_url'] = base_url().'index.php/Home/view-berita/'.$kategori;
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
			if(is_null($this->uri->segment(4)))
				$dari = $tabel->num_rows() - $per_page;
			else
				$dari = $tabel->num_rows() - $this->uri->segment(4)*$per_page;
			if($dari<0)
				$dari=0;
			
			if ($kategori=="all")
				$data["tabel"] = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $dari,$per_page");
			else
				$data["tabel"]= $this->db->query("SELECT * FROM berita WHERE kategori='$kategori' ORDER BY id_berita DESC LIMIT $dari,$per_page");
			$this->load->view('list-berita',$data);
		}
	}
}
