<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectClass extends CI_Controller
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

    //@desc     show subclass table
    //@route    GET admin/subclass
    public function subclass($year)
    {
        $data['classes'] = $this->Subject->subclassTotal($year);
        $data['year'] = $year;
        $this->load->view('admin/subclass/subclass', $data);
    }

    //@desc     edit subclass table
    //@route    GET admin/subclass/:classId/edit
    public function edit($id, $year)
    {
        $semester = $this->BM->getFirst("semesters");
        $data['semesterName'] = $semester->semester_name;
        $data['smClass'] = ".sm-".$semester->id;
        $data['smId'] = $semester->id;
        $data['semesters'] = $this->BM->getALl("semesters");
        $data['subjects'] = $this->BM->getAll("subjects");
        $data['class'] = $this->BM->getById("class", $id);
        $data['year'] = $year;
        $this->load->view('admin/subclass/edit', $data);
    }

    //@desc     check class & semester subjects
    //@route    GET admin/subclass/:classId/:semesterId/:year/edit
    public function checkClassSubjects($classId, $smId, $year)
    {   
        $subjects = $this->BM->getWhere(
                        "subclass", 
                        [
                            'class_id' => $classId,
                            'semester_id' => $smId,
                            'year' => $year
                        ]
                    )->result();
        appJson([
            "subjects" => $subjects
        ]);
    }

    //@desc     list class & semester subjects
    //@route    GET admin/subclass/:classId/:year/sublist
    public function subclassList($classId, $year)
    {   
        $sublist = $this->Subject->subclassList($classId, $year);
        $newSub = [];
        foreach ($sublist as $sub) {
            $sname = $sub->semester_name;
            $newSub[$sname][] = [
                "subject_name" => $sub->subject_name,
                "subject_id" => $sub->id,
                "semester_name" => $sname,
                "semester_id" => $sub->semester_id
            ];
        }
        $data['sublist'] = $newSub;
        $this->load->view("admin/subclass/sublist", $data);
    }

    //@desc     add class & semester subjects
    //@route    GET admin/subclass/add
    public function addSubclass()
    {   
        $obj = fileGetContent();
        $data = [
            "class_id" => $obj->classId,
            "semester_id" => $obj->smId,
            "subject_id" => $obj->subId,
            "year" => $obj->year
            
        ];
        
        $subclass = $this->BM->create("subclass", $data);
        if($subclass) {
            appJson([
                "success" => true,
                "message" => "Berhasil menambahkan mata pelajaran ke dalam Kelas"
            ]);
        }
    }

    //@desc     delete subclass
    //@route    DELETE admin/subclass/:subId/delete
    public function delete($subId)
    {         
        $delete = $this->BM->deleteById("subclass", $subId);
        if($delete) {
            appJson([
                "success" => true,
                "message" => "Berhasil menghapus pelajaran"
            ]);
        }
    }
}