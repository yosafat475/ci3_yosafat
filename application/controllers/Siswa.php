<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('Siswamodel');
    }
	public function index()
	{
        $data = $this->Siswamodel->getSiswa();
		$this->load->view ('siswa/index',['data'=>$data]);
	}

    public function error()
    {
        $this->load->view('siswa/tambah');
    }
    public function tambah()
    {
        $this->load->view('siswa/tambah');
    }
    public function action_tambah()
    {
        if($this->Siswamodel->simpan()){
            redirect (base_url('index.php/siswa/tambah'));
        }else{
            redirect (base_url('index.php/siswa/error'));
        }
    }

    public function edit($id)
    {
        $data = $this->Siswamodel->getData($id);
        $this->load->view('siswa/edit',['data'=>$data]);
    }
    public function action_edit($id)
    {
        if($this->Siswamodel->edit($id)){
            redirect (base_url('index.php/siswa/edit/',$id));
        }else{
            redirect (base_url('index.php/siswa/error'));
        }
    }
    public function delete($id)
    {
        if($this->Siswamodel->delete($id)){
            redirect(base_url('index.php/siswa/'));
        }
    }
}