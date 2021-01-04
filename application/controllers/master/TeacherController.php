<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeacherController extends CI_Controller
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

    //@desc     show teachers table
    //@route    GET admin/teachers
    public function teachers()
    {
        $this->load->view('admin/teachers/teachers');
    }

    //@desc     show data teachers table
    //@route    GET admin/teachers/teachers-table
    public function teachersTable()
    {
        $teachers = $this->datatables->setDatatables(
            "teachers",
            [
                "columns" => ["id", "nip", "name", "ttl", "gender", "status", "work_status", "edumajor", "major"],
                "searchable" => ["nip", "name", "CONCAT(birth_place,', ',date_format(birth_date, '%d %m %Y'))", 
                    "gender", "status", "work_status", "CONCAT(education, ' - ',major)"],
                "actions" => "admin/actions/edit-delete",
                "delete_message" => [
                    'name' => "Yakin ingin menghapus [name] pada data Guru",
                ],
                "middleware" => [
                    "created_at" => "toDateTime",
                ],
                "querySelector" => "teachers",
            ]
        );
        json($teachers);
    }

    //@desc     teachers create view
    //@route    GET admin/teachers/create
    public function create()
    {
        $this->load->view('admin/teachers/create');
    }

    //@desc     teachers create action
    //@route    POST admin/teachers/add
    public function add()
    {
        $post = getPost();
        $post['birth_date'] = revDate($post['birth_date']);
        if (!$this->validator()) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $teacher = $this->BM->create("teachers", $post);
        if ($teacher) {
            $dataUser = [
                "name" => $post['name'],
                "email" => $post['email'],
                "password" => password_hash("123456", PASSWORD_BCRYPT),
                "role" => 2,
                "is_verified" => 1
            ];
            $user = $this->BM->create("users", $dataUser);
            if($user) {
                $updateTeacher = $this->BM->updateById("teachers", $teacher->id, ["user_id" => $user->id]);
                appJson([
                    "message" => "Berhasil menambah data Guru",
                ]);
            }
        }
    }

    //@desc     teachers update view
    //@route    GET admin/teachers/:teacherId/edit
    public function edit($id)
    {
        $teacher = $this->BM->checkById("teachers", $id);
        $data = [
            "teacher" => $teacher,
        ];
        $this->load->view('admin/teachers/edit', $data);
    }

    //@desc     teachers update action
    //@route    POST admin/teachers/:teacherId/update
    public function update($id)
    {
        $post = getPost();
        $post['birth_date'] = revDate($post['birth_date']);
        if (!$this->validator([], $id)) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $teacher = $this->BM->updateById("teachers", $id, $post);
        if ($teacher) {
            $dataUser = [
                "name" => $post['name'],
                "email" => $post['email']
            ];
            $this->BM->updateById("users", $teacher->user_id, $dataUser);
            appJson([
                "message" => "Berhasil mengubah data Guru",
            ]);
        }
    }

    //@desc     teachers delete action
    //@route    GET admin/teachers/:teachersId/delete
    public function delete($id)
    {
        $teacher = $this->BM->getById("teachers", $id);
        $this->BM->deleteById("teachers", $id);
        $this->BM->deleteById("users", $teacher->user_id);
        appJson($id);
    }

    //@validate the input
    public function validator($skip = [], $id = null)
    {
        $uniqueNip = $id ? "teachers.nip.$id" : "teachers.nip";
        $uniqueEmail = $id ? "teachers.email.$id" : "teachers.email";

        $rules = [
            "nip" => [
                'field' => 'nip',
                'rules' => "required|trim|isUnique[$uniqueNip]",
                'errors' => [
                    'required' => '* Nip tidak boleh kosong',
                    'isUnique' => 'Nip sudah digunakan',
                ],
            ],
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
            "email" => [
                'field' => 'email',
                'label' => 'Email',
                'rules' => "required|trim|isUnique[$uniqueEmail]",
                'errors' => [
                    'required' => '* Email tidak boleh kosong',
                    'isUnique' => 'Email sudah digunakan',
                ],
            ],
            "major" => [
                'field' => 'major',
                'rules' => 'required',
                'errors' => [
                    'required' => '* Jurusan kuliah tidak boleh kosong',
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
