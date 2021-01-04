<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function subclassList($classId, $year)
    {
        return $this->db
                ->select("a.*, b.subject_name, c.classname, d.semester_name")
                ->from("subclass AS a")
                ->join("subjects AS b", "a.subject_id = b.id")
                ->join("class AS c", "a.class_id = c.id")
                ->join("semesters AS d", "a.semester_id = d.id")
                ->where("a.class_id", $classId)
                ->where("a.year", $year)
                ->order_by('d.semester_name', "asc")
                ->get()
                ->result();
    }

    public function subclassTotal($year)
    {
        return $this->db
                ->query("
                    SELECT a.*, 
                    (SELECT COUNT(b.id) FROM subclass AS b WHERE b.year = '$year' AND b.class_id = a.id) AS total_subject 
                    FROM class AS a
                ")
                ->result();
    }

    public function subclassTeacers($classId, $year)
    {
        return $this->db
                ->select("a.*, b.subject_name, c.classname, d.id AS semester_id, d.semester_name, f.name AS teacher_name")
                ->from("subclass AS a")
                ->join("subjects AS b", "a.subject_id = b.id", "left")
                ->join("class AS c", "a.class_id = c.id", "left")
                ->join("semesters AS d", "a.semester_id = d.id", "left")
                ->join("subteachers AS e", "a.id = e.subclass_id", "left")
                ->join("teachers AS f", "e.teacher_id = f.id", "left")
                ->where("a.class_id", $classId)
                ->where("a.year", $year)
                ->order_by('d.semester_name', "asc")
                ->get()
                ->result();
    }

    public function classValuesStudentList($classId, $year)
    {
        return $this->db
                ->select("a.class_id, b.student_id, c.name")
                ->from("subclass AS a")
                ->join("student_values AS b", "a.id = b.subclass_id")
                ->join("students AS c", "c.id = b.student_id")
                ->where("a.class_id", $classId)
                ->where("a.year", $year)
                ->group_by("b.student_id")
                ->get()
                ->result();
    }
}
