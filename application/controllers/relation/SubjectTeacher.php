<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectTeacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->model("SubjectModel", "Subject");
        $this->load->library('Datatables', 'datatables');
        $this->load->library("form_validation");
        $this->load->helper("utility");
        $this->auth->logged();
    }

    //@desc     show subteachers table
    //@route    GET admin/subteachers
    public function subteachers($year)
    {
        $data['classes'] = $this->Subject->subclassTotal($year);
        $data['year'] = $year;
        $this->load->view('admin/subteachers/subteachers', $data);
    }

    //@desc     edit subteachers table
    //@route    GET admin/subteachers/:classId/edit
    public function edit($id, $year)
    {     
        $data['class'] = $this->BM->getById("class", $id);
        $data['teachers'] = $this->BM->getAll("teachers");
        $data['year'] = $year;
        $this->load->view('admin/subteachers/edit', $data);
    }

    //@desc     check class & semester subjects
    //@route    GET admin/subteachers/:classId/:semesterId/:subjectId/:year/edit
    public function checkClassSubjects($classId, $smId, $subjectId, $year)
    {   
        $subId = $this->BM->getWhere("subclass", 
            [
                'class_id' => $classId, 
                'semester_id' => $smId,
                'subject_id' => $subjectId,
                'year' => $year
            ]
        )->row()->id;
        $subteacher = $this->BM->getWhere("subteachers", ['subclass_id' => $subId])->row()->teacher_id;  
        appJson([
            "teacherId" => $subteacher
        ]);
    }

    //@desc     list class & semester subjects
    //@route    GET admin/subteachers/:classId/:year/sublist
    public function subclassTeacers($classId, $year)
    {   
        $sublist = $this->Subject->subclassTeacers($classId, $year);
        $newSub = [];
        foreach ($sublist as $sub) {
            $newSub[$sub->semester_name][] = [
                "subclass_id" => $sub->id,
                "subject_name" => $sub->subject_name,
                "teacher_name" => $sub->teacher_name,
                "semester_id" => $sub->semester_id,
                "subject_id" => $sub->subject_id
            ];
        }
        $data['sublist'] = $newSub;
        $this->load->view("admin/subteachers/sublist", $data);
    }

    //@desc     add subteachers
    //@route    GET admin/subteachers/add
    public function add()
    {   
        $obj = fileGetContent();
        $data = [
            "subclass_id" => $obj->subclass_id,
            "teacher_id" => $obj->teacher_id
        ];
        $exist = $this->BM->getWhere("subteachers", ["subclass_id" => $obj->subclass_id])->row();
        $teacher = $exist
            ? $this->BM->updateById("subteachers", $exist->id, $data)
            : $this->BM->create("subteachers", $data);
        if($teacher) {
            appJson([
                "message" => "Guru berhasil ditambahkan"
            ]);
        }
    }

}