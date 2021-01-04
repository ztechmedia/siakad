<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSMSubclass($classId, $semesterId, $year)
    {
        return $this->db
                ->select("a.id, b.subject_name AS name")
                ->from("subclass AS a")
                ->join("subjects AS b", "a.subject_id = b.id")
                ->where("a.class_id", $classId)
                ->where("a.semester_id", $semesterId)
                ->where("a.year", $year)
                ->get()
                ->result();
    }

    public function getScheduleList($classId, $year)
    {
        return $this->db
                ->select("a.*, b.semester_id, c.semester_name, d.subject_name")
                ->from("schedules AS a")
                ->join("subclass AS b", "a.subclass_id = b.id")
                ->join("semesters AS c", "b.semester_id = c.id")
                ->join("subjects AS d", "b.subject_id = d.id")
                ->where("b.class_id", $classId)
                ->where("b.year", $year)
                ->order_by("a.day", "asc")
                ->get()
                ->result();
    }
}