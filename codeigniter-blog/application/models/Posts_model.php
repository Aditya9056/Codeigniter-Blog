<?php 

    class Posts_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            {
                $this->load->database();
            }
        }

        public function get_posts($slug = FALSE, $limit = false, $offset = false){

            if($limit){
                $this->db->limit($limit, $offset);
            }

            if($slug == FALSE){
                $this->db->order_by('posts_data.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts_data.category_id');
                $query = $this->db->get('posts_data');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts_data', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'post_image' => $post_image,
                'user_id' => $this->session->userdata('user_id'),
                'category_id' => $this->input->post('category_id')
            );
            return $this->db->insert('posts_data', $data);
        }

        public function delete_post($id = FALSE){
            if(isset($id)){

                $this->db->where('id', $id);
                $this->db->delete('posts_data');
                return true;
            }
        }

        public function update($post_image){

            $slug = url_title($this->input->post('title'));

            $data = array(            
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'post_image' => $post_image,
                'category_id' => $this->input->post('category_id')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts_data', $data);

        }
        public function get_categories()
        {
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        
        public function get_posts_by_category($category_id){
            
            $this->db->order_by('posts_data.category_id', 'DESC');
            $this->db->join('categories', 'categories.id = posts_data.category_id');
            $query = $this->db->get_where('posts_data', array('category_id' => $category_id));
            return $query->result_array();
        }
    }


?>