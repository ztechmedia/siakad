<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DatatablesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel", "User");
    }

    public function totalDocument($table, $querySelector)
    {
        if ($querySelector) {
            $query = $this->querySelector($querySelector)->get();
        } else {
            $query = $this->db->get($table);
        }
        return $query->num_rows();
    }

    public function getAll($table, $limit, $start, $col, $dir, $querySelector)
    {
        if ($querySelector) {
            $query = $this->querySelector($querySelector)
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get();
        } else {
            $query = $this
                ->db
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get($table);
        }

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function dataSearch($table, $limit, $start, $search, $col, $dir, $searchAble, $querySelector)
    {
        $like = 0;
        $query = $querySelector 
            ? $this->querySelector($querySelector) 
            : $this->db->select("*")->from($table);
        
        foreach ($searchAble as $sc) {
            if($like === 0) {
                $query->like($sc, $search);
            }else{
                $query->or_like($sc, $search);
            }
            $like++;
        }

        return $query->limit($limit, $start)->order_by($col, $dir)->get()->result();
    }

    public function dataSearchCount($table, $search, $searchAble, $querySelector)
    {
        $like = 0;
        $query = $querySelector 
            ? $this->querySelector($querySelector) 
            : $this->db->select("*")->from($table);

        foreach ($searchAble as $sc) {
            if($like === 0) {
                $query->like($sc, $search);
            }else{
                $query->or_like($sc, $search);
            }
            $like++;
        }

        return $query->get()->result();
    }

    public function querySelector($type)
    {
        switch ($type) {
            case "user-admin":
                return $this->User->users(["role" => 1]);
            case "user-teacher":
                return $this->User->users(["role" => 2]);
            case "user-student":
                return $this->User->users(["role" => 3]);
            case "teachers":
                return $this->db
                        ->select("*, 
                            CONCAT(birth_place,', ',date_format(birth_date, '%d-%m-%Y')) AS ttl, 
                            CONCAT(education, ' - ',major) AS edumajor")
                        ->from("teachers");
            case "students":
                return $this->db
                        ->select("a.*, 
                            CONCAT(a.birth_place,', ',date_format(a.birth_date, '%d-%m-%Y')) AS ttl, 
                            CONCAT('Kelas ', b.classname,' - ',c.semester_name) AS classes,")
                        ->from("students AS a")
                        ->join("class AS b", "a.class_id = b.id")
                        ->join("semesters AS c", "a.semester_id = c.id");
        }
    }

}
