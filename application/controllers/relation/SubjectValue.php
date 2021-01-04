<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectValue extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->model("ValueModel", "Value");
        $this->load->model("SubjectModel", "Subject");
        $this->load->library('Datatables', 'datatables');
        $this->load->library("form_validation");
        $this->load->helper("utility");
        $this->auth->logged();
    }

    public function values()
    {
        $this->load->view('admin/values/values');
    }

    public function classValues($year)
    {
        $data['classes'] = $this->BM->getALl("class");
        $data['year'] = $year;
        $this->load->view('admin/values/class/class-values', $data);
    }

    public function classValuesList($classId, $year)
    {
        $data['students'] = $this->Subject->classValuesStudentList($classId, $year);
        $data['class'] = $this->BM->getById("class", $classId);
        $data['year'] = $year;
        $this->load->view('admin/values/class/student-list', $data);
    }

    public function studentListValues($classId, $year, $studentId)
    {
        $sublist = $this->Value->subclassListExist($classId, $year, $studentId);
        $newSub = [];
        $subclassId = [];
        foreach ($sublist as $sub) {
            $sname = $sub->semester_name;
            $newSub[$sname][] = [
                "id" => $sub->id,
                "subject_name" => $sub->subject_name,
                "task" => isset($sub->task) ? $sub->task : 0,
                "midtest" => isset($sub->midtest) ? $sub->midtest : 0,
                'endtest' => isset($sub->endtest) ? $sub->endtest : 0
            ];
        }
        $data['sublist'] = $newSub;
        $data['student'] = $this->BM->getById("students", $studentId);
        $this->load->view('admin/values/class/student-list-values', $data);
    }

    public function studentSearch()
    {
       $obj = fileGetContent();
       $data['students'] = $this->Value->getStudents("name", $obj->student);
       $this->load->view("admin/values/student-list", $data);
    }

    public function studentClasslist($studentId)
    {
        $this->BM->checkById("students", $studentId);
        $data['student'] = $this->Value->getStudent($studentId);
        $data['classes'] = $this->BM->getAll("class");
        $this->load->view("admin/values/student-classlist", $data);
    }

    public function setValues($studentId, $classId)
    {
        $data['student'] = $this->Value->getStudent($studentId);
        $data['classId'] = $classId;
        $data['year'] = date("Y");
        $this->load->view("admin/values/setvalues", $data);
    }

    public function subclass($classId, $year, $studentId)
    {
        $sublist = $this->Value->subclassListExist($classId, $year, $studentId);
        $action = "update";
        if(count($sublist) == 0) {
            $sublist = $this->Value->subclassList($classId, $year);
            $action = "add";
        }
        $newSub = [];
        $subclassId = [];
        $subFilter = [];

        if($this->auth->role == "teacher") {
            $teacherId = $this->BM->getWhere("teachers", ['user_id' => $this->auth->userId])->row()->id;
            $subteachers = $this->BM->getWhere("subteachers", ["teacher_id" => $teacherId])->result();
            foreach ($subteachers as $subteacher) {
                array_push($subFilter, $subteacher->subclass_id);
            }
        }

        foreach ($sublist as $sub) {
            $sname = $sub->semester_name;
            array_push($subclassId, $sub->id);
            $status = false;
            if(count($subFilter) > 0) {
                $status = in_array($sub->id, $subFilter) ? false : true;
            }
            $newSub[$sname][] = [
                "id" => $sub->id,
                "subject_name" => $sub->subject_name,
                "status" => $this->auth->role == 'student' ? false : $status,
                "task" => isset($sub->task) ? $sub->task : 0,
                "midtest" => isset($sub->midtest) ? $sub->midtest : 0,
                'endtest' => isset($sub->endtest) ? $sub->endtest : 0
            ];
        }
        $data['sublist'] = $newSub;
        $data['action'] = $action;
        $data['studentId'] = $studentId;
        $data['subclassId'] = $subclassId;
        $this->load->view("admin/values/subclass", $data);
    }

    public function add($studentId)
    {
        $post = getPost();
        $this->action($studentId, $post, "add");
    }

    public function update($studentId)
    {
        $post = getPost();
        $this->action($studentId, $post, "update");
    }

    public function action($studentId, $post, $action)
    {
        $subclass = $post['subclass_id'];
        $task = $post['task'];
        $midtest = $post['midtest'];
        $endtest = $post['endtest'];
        foreach ($subclass as $id) {
            $data[] = [
                "subclass_id" => $id,
                "student_id" => $studentId,
                "task" => $task[$id][0],
                "midtest" => $midtest[$id][0],
                "endtest" => $endtest[$id][0],
            ];
        }

        $save = $action == "add"
            ? $this->BM->createMultiple("student_values", $data)
            : $this->BM->updateMultiple("student_values", $data, "subclass_id");
        if($save || $save == 0) {
            appJson([
                "message" => "Berhasil menyimpan nilai siswa"
            ]);
        }
    }

    public function delete()
    {
        $obj = fileGetContent();
        $delete = $this->BM->deleteMultipleColumn('student_values',
            [
                "student_id" => $obj->studentId
            ],
            [
                "subclass_id" => $obj->subclassId
            ]);
        if($delete) {
            appJson([
                "message" => "Reset nilai berhasil"
            ]);
        }
    }

    public function studentValue()
    {
        $studentId = $this->BM->getWhere("students", ["user_id" => $this->auth->userId])->row();
        $student_id = $studentId ? $studentId->id : null;
        if($student_id) {
            $data['student'] = $this->Value->getStudent($student_id);
        }
        $data['classes'] = $this->BM->getAll("class");
        $this->load->view("admin/student-value/student-value", $data);
    }
}