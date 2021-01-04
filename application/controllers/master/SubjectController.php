<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectController extends CI_Controller
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

    //@desc     show subjects table
    //@route    GET admin/subjects
    public function subjects()
    {
        $this->load->view('admin/subject/subject');
    }

    //@desc     show data subjects table
    //@route    GET admin/subjects/subjects-table
    public function subjectsTable()
    {
        $users = $this->datatables->setDatatables(
            "subjects",
            [
                "columns" => ["id", "subject_name"],
                "searchable" => ['subject_name'],
                "actions" => "admin/actions/edit-delete",
                "delete_message" => [
                    'name' => "Yakin ingin menghapus [name] pada data Mata Pelajaran",
                ],
            ]
        );
        json($users);
    }

    //@desc     subjects create view
    //@route    GET admin/subjects/create
    public function create()
    {
        $this->load->view('admin/subject/create');
    }

    //@desc     subjects create action
    //@route    POST admin/subjects/add
    public function add()
    {
        $post = getPost();
        if (!$this->validator()) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $teacher = $this->BM->create("subjects", $post);
        if ($teacher) {
            appJson([
                "message" => "Berhasil menambah data Mata Pelajaran",
            ]);
        }
    }

    //@desc     subjects update view
    //@route    GET admin/subjects/:subjectId/edit
    public function edit($id)
    {
        $subject = $this->BM->checkById("subjects", $id);
        $data = [
            "subject" => $subject,
        ];
        $this->load->view('admin/subject/edit', $data);
    }

    //@desc     subjects update action
    //@route    POST admin/subjects/:subjectId/update
    public function update($id)
    {
        $post = getPost();
        if (!$this->validator([], $id)) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $semester = $this->BM->updateById("subjects", $id, $post);
        if ($semester) {
            appJson([
                "message" => "Berhasil mengubah data Mata Pelajaran",
            ]);
        }
    }

    //@desc     subjects delete action
    //@route    GET admin/subjects/:subjectId/delete
    public function delete($id)
    {
        $this->BM->deleteById("subjects", $id);
        appJson($id);
    }
    
    //@validate the input
    public function validator($skip = [], $id = null)
    {
        $uniqueClass = $id ? "subjects.subject_name.$id" : "subjects.subject_name";

        $rules = [
            "subject_name" => [
                'field' => 'subject_name',
                'rules' => "required|trim|isUnique[$uniqueClass]",
                'errors' => [
                    'required' => '* Nama mata pelajaran tidak boleh kosong',
                    'isUnique' => 'Nama mata pelajaran sudah digunakan',
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
