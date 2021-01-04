<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->library("form_validation");
        $this->load->helper("utility");
    }

	public function home()
	{
        $data['view'] = "web/home";
        $data['menu'] = "home";
        $data['student'] = $this->BM->getTotalData("students");
        $data['subject'] = $this->BM->getTotalData("subjects");
        $data['teacher'] = $this->BM->getTotalData("teachers");
        $this->load->view('template/web/app', $data);
    }

    public function vimission()
    {
        $data['vimission'] = $this->BM->getById("vision_mission", 1);
        $data['view'] = "web/vimission";
        $data['menu'] = "vimission";
        $this->load->view('template/web/app', $data);
    }

    public function history()
    {
        $data['history'] = $this->BM->getById("history", 1)->description;
        $data['view'] = "web/history";
        $data['menu'] = "history";
        $this->load->view('template/web/app', $data);
    }

    public function register()
    {
        $data["view"] = "auth/register";
        $data['menu'] = "register";
        $data['semesters'] = $this->BM->getAll("semesters");
        $data['classes'] = $this->BM->getAll("class");
        $this->load->view("template/web/app", $data);
    }

    public function add()
    {
        $post = getPost();
        $post['birth_date'] = revDate($post['birth_date']);
        if (!$this->validator()) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $student = $this->BM->create("students", $post);
        if ($student) {
            $dataUser = [
                "name" => $post['name'],
                "email" => $post['email'],
                "password" => password_hash("123456", PASSWORD_BCRYPT),
                "role" => 3,
                "is_verified" => 1
            ];
            $user = $this->BM->create("users", $dataUser);
            $updateStudent = $this->BM->updateById("students", $student->id, ["user_id" => $user->id]);
            appJson([
                "message" => "Berhasil menambah data Murid",
            ]);
        }
    }

    public function validator($skip = [], $id = null)
    {
        $uniqueNis = $id ? "students.nis.$id" : "students.nis";
        $uniqueEmail = $id ? "students.email.$id" : "students.email";

        $rules = [
            "name" => [
                'field' => 'name',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Nama tidak boleh kosong',
                ],
            ],
            "birth_place" => [
                'field' => 'birth_place',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Tempat lahir tidak boleh kosong',
                ],
            ],
            "birth_date" => [
                'field' => 'birth_date',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Tanggal lahir tidak boleh kosong',
                ],
            ],
            "address" => [
                'field' => 'address',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Alamat tidak boleh kosong',
                ],
            ],
            "phone" => [
                'field' => 'phone',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Nomor telpon tidak boleh kosong',
                ],
            ],
            "email" => [
                'field' => 'email',
                'label' => 'Email',
                'rules' => "required|trim|isUnique[$uniqueEmail]",
                'errors' => [
                    'required' => '* Email tidak boleh kosong',
                    'isUnique' => 'Email sudah digunakan',
                ],
            ],
        ];

        $filterRules = [];

        foreach ($rules as $rule => $value) {
            if (!array_key_exists($rule, $skip)) {
                $filterRules[] = $rules[$rule];
            }
        }

        $this->form_validation->set_rules($filterRules);
        return $this->form_validation->run();
    }
}
