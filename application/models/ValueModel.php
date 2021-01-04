<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ValueModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStudents($column, $value)
    {
        return $this->db
                ->select("a.*, b.classname")
                ->from("students AS a")
                ->join("class AS b", "a.class_id = b.id")
                ->like($column, $value)
                ->order_by('a.name', "asc")
                ->get()
                ->result();
    }

    public function getStudent($studentId)
    {
        return $this->db
                ->select("a.*, b.classname")
                ->from("students AS a")
                ->join("class AS b", "a.class_id = b.id")
                ->where("a.id", $studentId)
                ->order_by('a.name', "asc")
                ->get()
                ->row();
    }

    public function subclassList($classId, $year)
    {
        return $this->db->query("
            SELECT a.id, b.semester_name, c.subject_name 
                FROM subclass AS a 
                LEFT JOIN semesters AS b ON a.semester_id = b.id 
                LEFT JOIN subjects AS c ON a.subject_id = c.id 
                WHERE a.class_id = '$classId' 
                    AND a.year = '$year'
                ORDER BY b.semester_name ASC
        ")->result();
    }

    public function subclassListExist($classId, $year, $studentId)
    {
        return $this->db->query("
            SELECT a.id, b.task, b.midtest, b.endtest, c.semester_name, d.subject_name 
                FROM subclass AS a 
                LEFT JOIN student_values AS b ON a.id = b.subclass_id 
                LEFT JOIN semesters AS c ON a.semester_id = c.id 
                LEFT JOIN subjects AS d ON a.subject_id = d.id 
                WHERE a.class_id = '$classId' 
                    AND a.year = '$year'
                    AND b.student_id = '$studentId'
                ORDER BY c.semester_name ASC
        ")->result();
    }
}