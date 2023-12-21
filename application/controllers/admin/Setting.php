<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller 
{

    private $id;
    
    public function __construct()
    {
        parent::__construct();
        $this->id	= $this->session->userdata('id');
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
    }
    

    public function index($id)
    {
        $data['content'] = $this->setting->where('id', $id)->first();

        if (!$data['content']) {
			$this->session->set_flashdata('warning', '<b>data tidak dapat ditemukan</b>');
			redirect(base_url('admin/setting'));
        }
        
        if (!$_POST) {
			$data['input']	= $data['content'];
		} else {
			$data['input']	= (object) $this->input->post(null, true);
			if ($data['input']->password !== '') {
				$data['input']->password = hashEncrypt($data['input']->password);
			} else {
				$data['input']->password = $data['content']->password;
			}
        }
        
        if (!$this->setting->validate()) {
			$data['title']			= 'Ubah Data Profile';
			$data['form_action']	= base_url("admin/setting/$id");
			$data['page']			= 'pages/admin/setting';

			$this->viewAdmin($data);
			return;
        }
        
        if ($this->setting->where('id', $id)->update($data['input'])) {
			$this->session->set_flashdata('success', '<b>Data berhasil disimpan!</b>');
		} else {
			$this->session->set_flashdata('error', '<b>Terjadi suatu kesalahan</b>');
		}

		redirect(base_url("admin/setting/$id"));
    }

    public function unique_username()
	{
		$email		= $this->input->post('username');
		$id			= $this->input->post('id');
		$user		= $this->setting->where('username', $username)->first();

		if ($user) {
			if ($id == $user->id) {
				return true;
			}
			$this->load->library('form_validation');
			$this->form_validation->set_message('unique_email', '%s sudah digunakan!');
			return false;
		}

		return true;
	}
}

/* End of file Setting.php */
