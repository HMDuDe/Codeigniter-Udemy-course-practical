<?php 
    class Department_Model extends CI_Model{
        
        public function saveDepartment($data){
            $this->db->insert('tbl_department', $data);
        }

        public function getAllDepartments(){
            $this->db->select('*');
            $this->db->from('tbl_department');
            $this->db->order_by('departmentId', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();

            return $result;
        }
    }
?>