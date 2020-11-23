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

        public function getDepartmentById($departmentId){
            $this->db->select('*');
            $this->db->from('tbl_department');
            $this->db->where('departmentId', $departmentId);

            $qresult = $this->db->get();
            $result = $qresult->row();

            return $result;
        }

        public function updateDepartmentData($data){
            $this->db->set('departmentName', $data['departmentName']);
            $this->db->where('departmentId', $data['departmentId']);
            $this->db->update('tbl_department');
        }

        public function deleteStudentById($departmentId){
            $this->db->where('departmentId', $departmentId);
            $this->db->delete('tbl_department');
        }
    }
?>