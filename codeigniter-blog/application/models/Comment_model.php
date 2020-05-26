<?php 

    class Comment_model extends CI_Model{

        public function __construct(){
            parent::__construct();
            {
                $this->load->database();
            }
        }
        
        public function create_comment($post_id){

            $data = array(
                'post_id'=> $post_id,
                'name' => $this->input->post('name'),
                'body' => $this->input->post('body')
            );

            return $this->db->insert('comments', $data);
        }

        public function get_comments($post_id){

            $this->db->order_by('comments.id', 'DESC');
            $query = $this->db->get_where('comments', array('post_id' => $post_id));
            return $query->result_array(); 
        }
    }