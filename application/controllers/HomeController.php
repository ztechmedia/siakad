<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->helper("utility");
        $this->auth->logged();
    }

    //@desc     show dashboard
    //@route    GET admin/dashboard
	public function dashboard()
	{
        $data['students'] = $this->BM->getTotalData("students");
        $data['teachers'] = $this->BM->getTotalData("teachers");
        $data['subjects'] = $this->BM->getTotalData("subjects");
        $data['class'] = $this->BM->getTotalData("class");
        $this->load->view('admin/dashboard/dashboard', $data);
    }
}
