<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BaseModel", "BM");
        $this->load->model("ScheduleModel", "Schedule");
        $this->load->library('Datatables', 'datatables');
        $this->load->library("form_validation");
        $this->load->helper("utility");
        $this->auth->logged();
    }

    public function schedule($year)
    {
        $data['classes'] = $this->BM->getAll("class");
        $data['year'] = $year;
        $this->load->view("admin/schedule/schedule", $data);
    }

    public function editSchedule($classId, $year)
    {
        $data['year'] = $year;
        $data['class'] = $this->BM->getById("class", $classId);
        $data['semesters'] = $this->BM->getAll("semesters");
        $this->load->view("admin/schedule/edit", $data);
    }

    public function smSubclass($classId, $semesterId, $year)
    {
        $subclasses = $this->Schedule->getSMSubclass($classId, $semesterId,$year);
        appJson($subclasses);
    }

    public function add()
    {
        $post = getPost();
        $check = $this->BM->getWhere("schedules", [
            "subclass_id" => $post["subclass_id"],
            "day" => $post['day']
        ])->row();
        if(!$check) {
            $this->BM->create("schedules", $post);
        } else{
            $this->BM->update("schedules", "subclass_id", $post['subclass_id'], $post);
        }
        appJson(["message" => "Jadwal berhasil disimpan"]);
    }

    public function scheduleList($classId, $year)
    {
        $schedules = $this->Schedule->getScheduleList($classId, $year);
        $newSchedule = [];
        foreach ($schedules as $schedule) {
            $sname = $schedule->semester_name;
            $newSchedule[$sname][dayName($schedule->day)][] = [
                "schedule_id" => $schedule->id,
                "subject_name" => $schedule->subject_name,
                "day" => dayName($schedule->day),
                "start_time" => $schedule->start_time,
                "end_time" => $schedule->end_time
            ];
        }
        $data['schedules'] = $newSchedule;
        $this->load->view("admin/schedule/schedule-list", $data);
    }

    public function delete($id)
    {
        $this->BM->deleteById("schedules", $id);
        appJson(["message" => "Berhasil menghapus jadwal"]);
    }

}