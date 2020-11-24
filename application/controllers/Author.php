<?php 
    class Author extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('author_model');
            $data = array();
        }

        public function addAuthor(){
            $data['title'] = 'Add New Author';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['authoradd'] = $this->load->view('inc/authoradd', '', TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('addauthor', $data);
        }

        public function addAuthorForm(){
            $data['authorName'] = $this->input->post('authorName');

            //Validate
            $authorName = $data['authorName'];

            if(empty($authorName)){
                $adata = array();
                $adata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';
    
                $this->session->set_flashdata($adata);
                redirect("author/addAuthor");
            }else{
                $this->author_model->saveAuthor($data);
    
                $adata = array();
                $adata['msg'] = '<span style="color:green">Author added successfully</span>';
    
                $this->session->set_flashdata($adata);
                redirect("author/addAuthor");
            }
        }

        public function authorlist(){
            $data['title'] = 'Author List';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['authorData'] = $this->author_model->getAllAuthors();
            $data['listauthor'] = $this->load->view('inc/listauthor', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('authorlist', $data);
        }

        public function editauthor($authorId){
            $data['title'] = 'Edit Author';
            $data['header'] = $this->load->view('inc/header', $data, TRUE);
            $data['sidebar'] = $this->load->view('inc/sidebar', '', TRUE);
            $data['authorDataById'] = $this->author_model->getAuthorDataById($authorId);
            $data['authoredit'] = $this->load->view('inc/authoredit', $data, TRUE);
            $data['footer'] = $this->load->view('inc/footer', '', TRUE);
            $this->load->view('editauthor', $data);
        }

        public function editAuthorForm(){
            $data['authorId'] = $this->input->post('authorId');
            $data['authorName'] = $this->input->post('authorName');

            //Validation
            $authorId = $data['authorId'];
            $authorName = $data['authorName'];

            if(empty($authorName)){
                $adata = array();
                $adata['msg'] = '<span style="color:red">Fields Must NOT be Empty</span>';
    
                $this->session->set_flashdata($adata);
                redirect("author/authorlist");
            }else{
                $this->author_model->updateAuthor($data);
    
                $adata = array();
                $adata['msg'] = '<span style="color:green">Author updated successfully</span>';
    
                $this->session->set_flashdata($adata);
                redirect("author/authorlist");
            }
        }

        public function deleteauthor($authorId){
            $this->author_model->deleteAuthorById($authorId);

            $adata = array();
            $adata['msg'] = '<span style="color:green">Author Data Deleted successfully</span>';

            $this->session->set_flashdata($adata);
            redirect("author/authorlist");
        }
    }
?>