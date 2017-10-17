<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cyber extends CI_Controller {

	/*function is_login()
	{
		return (($this->CI->session->userdata('logged_in')) ? TRUE : FALSE ) ;
	}*/
	public function index()
	{
		$login = array
		(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		if ($login['username']!=null && $login['password']!=null)
		{
			$query = $this->db->get('admin');
			foreach($query->result() as $row)
			{
				if($login['username'] == $row->username && $login['password'] == $row->password)
				{
					$newdata = array(
					'username' => $login['username'],
					'email' => $login['password'],
					'logged_in' => TRUE
					);
					break;
				}
			}
			if($logged_in!=true)
			{
				$query = $this->db->get('guru');
				foreach($query->result() as $row)
				{
					if($login['username'] == $row->username && $login['password'] == $row->password)
					{
						$newdata = array(
						'username' => $login['username'],
						'email' => $login['password'],
						'logged_in' => TRUE
						);
						break;
					}
				}
			}
			if($logged_in==true)
			{
				$this->session->set_userdata($newdata);
				$this->load->view('login');
			}
			else
				$this->load->view('salah');
		}
		/*else if(is_login())
		$this->load->view('login');*/
		else
		$this->load->view('home');
	}
	public function download()
	{
		$this->load->view('download');
	}
}
