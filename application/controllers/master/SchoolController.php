<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchoolController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->library('Datatables', 'datatables');
        $this->load->library("form_validation");
        $this->load->helper("utility");
        $this->auth->logged();
    }

    public function history()
    {
        $data['history'] = $this->BM->getById("history", 1);
        $this->load->view("admin/history/history", $data);
    }

    public function historyUpdate()
    {
        $post = getPost();
        $update = $this->BM->updateById("history", 1, $post);
        if($update) {
            appJson([
                "message" => "Berhasil mengubah sejarah sekolah"
            ]);
        }
    }

    public function vimission()
    {
        $data['vimission'] = $this->BM->getById("vision_mission", 1);
        $this->load->view("admin/vimission/vimission", $data);
    }

    public function updateVimission()
    {
        $post = getPost();
        $update = $this->BM->updateById("vision_mission", 1, $post);
        if($update) {
            appJson([
                "message" => "Berhasil mengubah Visi & Misi sekolah"
            ]);
        }
    }
    
}