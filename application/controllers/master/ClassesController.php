<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClassesController extends CI_Controller
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

    //@desc     show class table
    //@route    GET admin/class
    public function classes()
    {
        $this->load->view('admin/classes/classes');
    }

    //@desc     show data class table
    //@route    GET admin/class/class-table
    public function classesTable()
    {
        $users = $this->datatables->setDatatables(
            "class",
            [
                "columns" => ["id", "classname"],
                "searchable" => ['classname'],
                "actions" => "admin/actions/edit-delete",
                "delete_message" => [
                    'name' => "Yakin ingin menghapus [name] pada data Kelas",
                ],
            ]
        );
        json($users);
    }

    //@desc     class create view
    //@route    GET admin/class/create
    public function create()
    {
        $this->load->view('admin/classes/create');
    }

    //@desc     class create action
    //@route    POST admin/class/add
    public function add()
    {
        $post = getPost();
        if (!$this->validator()) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $teacher = $this->BM->create("class", $post);
        if ($teacher) {
            appJson([
                "message" => "Berhasil menambah data Kelas",
            ]);
        }
    }

    //@desc     class update view
    //@route    GET admin/class/:classId/edit
    public function edit($id)
    {
        $class = $this->BM->checkById("class", $id);
        $data = [
            "class" => $class,
        ];
        $this->load->view('admin/classes/edit', $data);
    }

    //@desc     class update action
    //@route    POST admin/class/:classId/update
    public function update($id)
    {
        $post = getPost();
        if (!$this->validator([], $id)) {
            appJson(['errors' => $this->form_validation->error_array()]);
        }

        $class = $this->BM->updateById("class", $id, $post);
        if ($class) {
            appJson([
                "message" => "Berhasil mengubah data Guru",
            ]);
        }
    }

    //@desc     class delete action
    //@route    GET admin/class/:classId/delete
    public function delete($id)
    {
        $this->BM->deleteById("class", $id);
        appJson($id);
    }
    
    //@validate the input
    public function validator($skip = [], $id = null)
    {
        $uniqueClass = $id ? "class.classname.$id" : "class.classname";

        $rules = [
            "classname" => [
                'field' => 'classname',
                'rules' => "required|trim|isUnique[$uniqueClass]",
                'errors' => [
                    'required' => '* Nama kelas tidak boleh kosong',
                    'isUnique' => 'Nama kelas sudah digunakan',
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
