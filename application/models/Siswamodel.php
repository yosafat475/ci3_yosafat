<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswamodel extends CI_Model {
    public function simpan()
    {
        $data = $this->input->post();
        if(!empty ($data)){
            return $this->db->insert ('siswa', $data);
        }
    }

    public function Edit($id)
    {
        $data = $this->input->post();
        if(!empty ($data)){
            return $this->db->update('siswa', $data,['id'=>$id]);
        }
    }

    public function getSiswa()
    {
        $username = $this->input->get('username');
        if(!empty ($username)){
            return $this->db->query('SELECT * FROM siswa WHERE username LIKE ?','%'.$username.'%')->result_array();
        }else{
            return $this->db->get('siswa')->result_array();
        }
    }
    public function getData($id)
    {
        return $this->db->get_where('siswa',['id'=>$id])->row_array();
    }
    public function delete($id){
        return $this->db->delete('siswa',['id'=>$id]);
    }
}