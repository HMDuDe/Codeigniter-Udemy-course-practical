<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Book extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('book_model');
            $this->load->model('department_model');
            $this->load->model('author_model');
            $data = array();
        }

        public function addBook(){
            $data['title'] = 'Add New Book';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);

            $data['authorData'] = $this->author_model->getAllAuthors();
            $data['departmentData'] = $this->department_model->getAllDepartments();
            $data['content'] = $this->load->view('inc/bookadd', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('home', $data);
        }

        public function addBookForm(){
            $data['bookName'] = $this->input->post('bookName');
            $data['department'] = $this->input->post('department');
            $data['authorName'] = $this->input->post('authorName');
            $data['amount'] = $this->input->post('amount');

            //Validate
            $bookName = $data['bookName'];
            $department = $data['department'];
            $authorName = $data['authorName'];
            $amount = $data['amount'];

            if(empty($bookName) || empty($department) || empty($authorName) || empty($amount)){
                $bdata = array();
                $sdata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';

                $this->session->set_flashdata($sdata);
                redirect("book/addBook");
            }else{
                $this->book_model->saveBook($data);

                $sdata = array();
                $sdata['msg'] = '<span style="color:green">Book added successfully</span>';

                $this->session->set_flashdata($sdata);
                redirect("book/addBook");
            }
        }

        public function listBook(){
            $data['title'] = 'All Books';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);

            $data['bookData'] = $this->book_model->getAllBooksData();
            $data['content'] = $this->load->view('inc/listBooks', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('home', $data);
        }

        public function editBook($bookId){
            $data['title'] = 'Edit Book';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);

            $data['bookDataById'] = $this->book_model->getBookDataById($bookId);
            $data['departmentData'] = $this->department_model->getAllDepartments();
            $data['authorData'] = $this->author_model->getAllAuthors();
            $data['content'] = $this->load->view('inc/editBook', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('home', $data);
        }

        public function editBookForm(){
            $data['bookId'] = $this->input->post('bookId');
            $data['bookName'] = $this->input->post('bookName');
            $data['department'] = $this->input->post('department');
            $data['authorName'] = $this->input->post('authorName');
            $data['amount'] = $this->input->post('amount');

            //Validation
            $bookId = $data['bookId'];
            $bookName = $data['bookName'];
            $department = $data['department'];
            $authorName = $data['authorName'];
            $amount = $data['amount'];

            if(empty($bookName) || empty($department) || empty($authorName) || empty($amount)){
                $bdata = array();
                $bdata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';
    
                $this->session->set_flashdata($bdata);
                redirect("book/editBook/".$bookId);
            }else{
                $this->book_model->updateBook($data);
    
                $adata = array();
                $adata['msg'] = '<span style="color:green">Book updated successfully</span>';
    
                $this->session->set_flashdata($adata);
                redirect("book/editBook/".$bookId);
            }
        }

        public function deleteBook($bookId){
            $this->book_model->deleteBookById($bookId);

            $bdata = array();
            $bdata['msg'] = '<span style="color:green">Book Data Deleted successfully</span>';

            $this->session->set_flashdata($bdata);
            redirect("book/listBook");
        }
    }
?>