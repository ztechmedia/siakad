<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SemesterController extends CI_Controller
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

    //@desc     show semesters table
    //@route    GET admin/semesters
    public function semesters()
    {
        $this->load->view('admin/semesters/semesters');
    }

    //@desc     show data semesters table
    //@route    GET admin/semesters/semesters-table
    public function semestersTable()
    {
        $users = $this->datatables->setDatatables(
            "semesters",
            [
                "columns" => ["id", "semester_name"],
                "searchable" => ['semester_name'],
                "actions" => "admin/actions/edit-delete",
                "delete_message" => [
                    'name' => "Yakin ingin menghapus [name] pada data Semester",
                ],
            ]
        );
        json($users);
    }

    //@desc     semesters create view
    //@route    GET admin/semesters/create
    public function create()
    {
        $this->load->view('admin/semesters/create');
    }

    //@desc     semesters create action
    //@route    POST admin/semesters/add
    public function add()
    {
        $post = getPost();
        if (!$this->validator()) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $teacher = $this->BM->create("semesters", $post);
        if ($teacher) {
            appJson([
                "message" => "Berhasil menambah data Semester",
            ]);
        }
    }

    //@desc     semesters update view
    //@route    GET admin/semesters/:semesterId/edit
    public function edit($id)
    {
        $semester = $this->BM->checkById("semesters", $id);
        $data = [
            "semester" => $semester,
        ];
        $this->load->view('admin/semesters/edit', $data);
    }

    //@desc     semesters update action
    //@route    POST admin/semesters/:semesterId/update
    public function update($id)
    {
        $post = getPost();
        if (!$this->validator([], $id)) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $semester = $this->BM->updateById("semesters", $id, $post);
        if ($semester) {
            appJson([
                "message" => "Berhasil mengubah data Semester",
            ]);
        }
    }

    //@desc     semesters delete action
    //@route    GET admin/semesters/:semesterId/delete
    public function delete($id)
    {
        
        $checkSub = $this->BM->getWhere("subclass", ['semester_id' => $id])->row();
        if($checkSub) {
            appJson([
                "errors" => "Semester sudah digunakan dalam relasi Kelas & Mata Pelajaran"
            ]);
        }
        $this->BM->deleteById("semesters", $id);
        appJson($id);
    }
    
    //@validate the input
    public function validator($skip = [], $id = null)
    {
        $uniqueClass = $id ? "semesters.semester_name.$id" : "semesters.semester_name";

        $rules = [
            "semester_name" => [
                'field' => 'semester_name',
                'rules' => "required|trim|isUnique[$uniqueClass]",
                'errors' => [
                    'required' => '* Nama semester tidak boleh kosong',
                    'isUnique' => 'Nama semester sudah digunakan',
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
