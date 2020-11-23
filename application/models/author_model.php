<?php 

    class Author_Model extends CI_Model{
        public function saveAuthor($data){
            $this->db->insert('tbl_author', $data);
        }

        public function getAllAuthors(){
            $this->db->select('*');
            $this->db->from('tbl_author');
            $this->db->order_by('authorId', 'desc');

            $qresult = $this->db->get();
            $result = $qresult->result();

            return $result;
        }

        public function getAuthorDataById($authorId){
            $this->db->select('*');
            $this->db->from('tbl_author');
            $this->db->where('authorId', $authorId);

            $qresult = $this->db->get();
            $result = $qresult->row();

            return $result;
        }

        public function updateAuthor($data){
            $this->db->set('authorName', $data['authorName']);
            $this->db->where('authorId', $data['authorId']);
            $this->db->update('tbl_author');
        }

        public function deleteStudentById($authorId){
            $this->db->where('authorId', $authorId);
            $this->db->delete('tbl_author');
        }
    }
?>