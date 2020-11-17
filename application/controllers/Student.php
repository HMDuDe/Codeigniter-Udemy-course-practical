<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('student_model');

        $data = array();
    }

    public function addstudent(){
        $data = array();
        $data['title'] = 'Add New Student';
        $data['header'] = $this->load->view('inc/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
        $data['studentAdd'] = $this->load->view('inc/studentAdd', '', TRUE);
        $data['footer'] = $this->load->view('inc/footer', '', TRUE);
        $this->load->view('addstudent', $data);
    }

    public function addStudentForm(){
        $data['name'] = $this->input->post('name');
        $data['department'] = $this->input->post('department');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['phone'] = $this->input->post('phone');

        //Validation
        $name = $data['name'];
        $department = $data['department'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $phone = $data['phone'];

        if(empty($name) && empty($department) && empty($roll) && empty($reg) && empty($phone)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';

            $this->session->set_flashdata($sdata);
            redirect("student/addstudent");
        }else{
            $this->student_model->saveStudent($data);

            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Student added successfully</span>';

            $this->session->set_flashdata($sdata);
            redirect("student/addstudent");
        }
    }

    public function studentlist(){
        $data['title'] = 'Student List';
        $data['header'] = $this->load->view('inc/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
        $data['studentdata'] = $this->student_model->getAllStudentData();
        $data['liststudent'] = $this->load->view('inc/liststudent', $data, TRUE);
        $data['footer'] = $this->load->view('inc/footer', '', TRUE);
        $this->load->view('studentlist', $data);
    }

    public function editstudent($studentId){
        $data['title'] = 'Student List';
        $data['header'] = $this->load->view('inc/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
        $data['studentById'] = $this->student_model->getStudentById($studentId);
        $data['studentedit'] = $this->load->view('inc/studentedit', $data, TRUE);
        $data['footer'] = $this->load->view('inc/footer', '', TRUE);
        $this->load->view('editstudent', $data);
    }

    public function updateStudent(){
        $data['studentId'] = $this->input->post('studentId');
        $data['name'] = $this->input->post('name');
        $data['department'] = $this->input->post('department');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['phone'] = $this->input->post('phone');

        //Validation
        $studentId = $data['studentId'];
        $name = $data['name'];
        $department = $data['department'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $phone = $data['phone'];

        if(empty($name) && empty($department) && empty($roll) && empty($reg) && empty($phone)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';

            $this->session->set_flashdata($sdata);
            redirect("student/editstudent/".$studentId);
        }else{
            $this->student_model->updateStudentData($data);

            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Student Data Updated successfully</span>';

            $this->session->set_flashdata($sdata);
            redirect("student/editstudent/".$studentId);
        }
    }

    public function deletestudent($studentId){
        $this->student_model->deleteStudentById($studentId);

        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Student Data Deleted successfully</span>';

        $this->session->set_flashdata($sdata);
        redirect("student/studentlist");
    }
}
