<?php 

    class Book_Model extends CI_Model{

        public function saveBook($data){
            $this->db->insert('tbl_book', $data);
        }

        public function getAllBooksData(){
            $this->db->select('*');
            $this->db->from('tbl_book');
            $this->db->order_by('bookId', 'desc');
            $qresult = $this->db->get();
            $result = $qresult->result();

            return $result;
        }

        public function getBookDataById($bookId){
            $this->db->select('*');
            $this->db->from('tbl_book');
            $this->db->where('bookId', $bookId);

            $qresult = $this->db->get();
            $result = $qresult->row();

            return $result;
        }

        public function updateBook($data){
            $this->db->set('bookName', $data['bookName']);
            $this->db->set('department', $data['department']);
            $this->db->set('authorName', $data['authorName']);
            $this->db->set('amount', $data['amount']);
            $this->db->where('bookId', $data['bookId']);
            $this->db->update('tbl_book');
        }

        public function deleteBookById($bookId){
            $this->db->where('bookId', $bookId);
            $this->db->delete('tbl_book');
        }
    }
?>