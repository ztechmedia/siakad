<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentController extends CI_Controller
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

    //@desc     show students table
    //@route    GET admin/students
    public function students()
    {
        $this->load->view('admin/students/students');
    }

    //@desc     show data students table
    //@route    GET admin/students/students-table
    public function studentsTable()
    {
        $students = $this->datatables->setDatatables(
            "students",
            [
                "columns" => ['id', 'nis', 'name', 'ttl', 'gender', 'address', 'classes'],
                "searchable" => ["a.nis", "a.name", 
                    "CONCAT(a.birth_place,', ',date_format(a.birth_date, '%d %m %Y'))",
                    'a.gender', 'a.address',
                    "CONCAT('Kelas ', b.classname,' - ',c.semester_name)",
                    ],
                "actions" => "admin/actions/edit-delete",
                "delete_message" => [
                    'name' => "Yakin ingin menghapus [name] pada data Murid",
                ],
                "querySelector" => "students",
            ]
        );
        json($students);
    }

    //@desc     students create view
    //@route    GET admin/students/create
    public function create()
    {
        $data['classes'] = $this->BM->getAll("class");
        $data['semesters'] = $this->BM->getAll("semesters");
        $this->load->view('admin/students/create', $data);
    }

    //@desc     students create action
    //@route    POST admin/students/add
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

    //@desc     students update view
    //@route    GET admin/students/:studentId/edit
    public function edit($id)
    {
        $student = $this->BM->checkById("students", $id);
        $data = [
            "student" => $student,
        ];
        $data['classes'] = $this->BM->getAll("class");
        $data['semesters'] = $this->BM->getAll("semesters");
        $this->load->view('admin/students/edit', $data);
    }

    //@desc     students update action
    //@route    POST admin/students/:studentId/update
    public function update($id)
    {
        $post = getPost();
        $post['birth_date'] = revDate($post['birth_date']);
        if (!$this->validator([], $id)) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $student = $this->BM->updateById("students", $id, $post);
        if ($student) {
            $dataUser = [
                "name" => $post['name'],
                "email" => $post['email']
            ];
            $this->BM->updateById("users", $student->user_id, $dataUser);
            appJson([
                "message" => "Berhasil mengubah data Murid",
            ]);
        }
    }


    //@desc     students delete action
    //@route    GET admin/students/:studentId/delete
    public function delete($id)
    {
        $student = $this->BM->getById("students", $id);
        $this->BM->deleteById("students", $id);
        $this->BM->deleteById("users", $student->user_id);
        appJson($id);
    }

    //@validate the input
    public function validator($skip = [], $id = null)
    {
        $uniqueNis = $id ? "students.nis.$id" : "students.nis";
        $uniqueEmail = $id ? "students.email.$id" : "students.email";

        $rules = [
            "nis" => [
                'field' => 'nis',
                'rules' => "required|trim|isUnique[$uniqueNis]",
                'errors' => [
                    'required' => '* Nis tidak boleh kosong',
                    'isUnique' => 'Nis sudah digunakan',
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
