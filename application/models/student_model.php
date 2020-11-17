<?php 
    class Student_Model extends CI_Model{
        
        public function saveStudent($data){
            $this->db->insert('tbl_student', $data);
        }

        public function getAllStudentData(){
            $this->db->select('*');
            $this->db->from('tbl_student');
            $this->db->order_by('studentId', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();

            return $result;
        }

        public function getStudentById($studentId){
            $this->db->select('*');
            $this->db->from('tbl_student');
            $this->db->where('studentId', $studentId);
            $qresult = $this->db->get();
            $result = $qresult->row();

            return $result;
        }

        public function updateStudentData($data){
            $this->db->set('name', $data['name']);
            $this->db->set('department', $data['department']);
            $this->db->set('roll', $data['roll']);
            $this->db->set('reg', $data['reg']);
            $this->db->set('phone', $data['phone']);
            $this->db->where('studentId', $data['studentId']);
            $this->db->update('tbl_student');
        }

        public function deleteStudentById($studentId){
            $this->db->where('studentId', $studentId);
            $this->db->delete('tbl_student');
        }
    }
?>