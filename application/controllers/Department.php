<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Department extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('department_model');
    
            $data = array();
        }

        public function adddepartment(){
            $data['title'] = 'Add New Department';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['departmentadd'] = $this->load->view('inc/departmentadd', '', TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('adddepartment', $data);
        }

        public function addDepartmentForm(){
            
            $data['departmentName'] = $this->input->post('department');
    
            //Validation
            $department = $data['departmentName'];
    
            if(empty($department)){
                $sdata = array();
                $sdata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';
    
                $this->session->set_flashdata($sdata);
                redirect("department/adddepartment");
            }else{
                $this->department_model->saveDepartment($data);
    
                $sdata = array();
                $sdata['msg'] = '<span style="color:green">Department added successfully</span>';
    
                $this->session->set_flashdata($sdata);
                redirect("department/adddepartment");
            }
        }

        public function departmentlist(){
            $data['title'] = 'Department List';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['departmentData'] = $this->department_model->getAllDepartments();
            $data['listdepartment'] = $this->load->view('inc/listdepartment', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('departmentlist', $data);
        }

        public function editdepartment($departmentId){
            $data['title'] = 'Edit Department';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['departmentDataById'] = $this->department_model->getDepartmentById($departmentId);
            $data['departmentEdit'] = $this->load->view('inc/departmentEdit', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('editDepartment', $data);
        }

        public function updateDepartment(){
            $data['departmentId'] = $this->input->post('departmentId');
            $data['departmentName'] = $this->input->post('departmentName');

            //Validation
            $departmentId = $data['departmentId'];
            $departmentName = $data['departmentName'];

            if(empty($departmentName)){
                $ddata = array();
                $ddata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';

                $this->session->set_flashdata($ddata);
                redirect("department/editdepartment/".$departmentId);
            }else{
                $this->department_model->updateDepartmentData($data);

                $ddata = array();
                $ddata['msg'] = '<span style="color:green">Department Data Updated successfully</span>';

                $this->session->set_flashdata($ddata);
                redirect("department/editdepartment/".$departmentId);
            }
        }

        public function deletedepartment($departmentId){
            $this->department_model->deleteStudentById($departmentId);

            $ddata = array();
            $ddata['msg'] = '<span style="color:green">Department Data Deleted successfully</span>';

            $this->session->set_flashdata($ddata);
            redirect("department/departmentlist");
        }
    }
?>