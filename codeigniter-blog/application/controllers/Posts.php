<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function index($offset = 0){

        // Pagination
        $config['base_url'] = base_url(). 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts_data');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        // Produces: class="myclass"
        $config['attributes'] = array('class' => 'pagination-link');


        $this->pagination->initialize($config);

        $data['posts']= $this->Posts_model->get_posts(FALSE, $config['per_page'], $offset);
        $data['title']= "Latest Posts";

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL){
        $data['posts'] = $this->Posts_model->get_posts($slug);
        $post_id = $data['posts']['id'];
        $data['comments'] =  $this->Comment_model->get_comments($post_id);

        if(empty($data['posts'])){
            show_404();
        }

        $data['title'] = $data['posts']['title'];
        
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        
        // Check if logged_in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title']= "Create Post";

        $data['category'] = $this->Posts_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');

        } else{
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5048';
            $config['max_width'] = '6000';
            $config['max_height'] = '6000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'no_image.jpg';

            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->Posts_model->create_post($post_image);     
            //Set Message
            $this->session->set_flashdata('post_created','You Post has been created.');
            redirect('posts');
        }
    }

    public function delete($id, $slug){

        // Check if logged_in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        //Check User
        if($this->session->userdata('user_id') === $this->Posts_model->get_posts($slug)['user_id']){

            if($this->Posts_model->delete_post($id)){
            
            //Set Message
            $this->session->set_flashdata('post_deleted','You Post has been Deleted.');            
            redirect('posts');
            }

        }else{
            redirect('posts');
        }
        
    }

    public function edit($slug){

        // Check if logged_in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        //Check User
        if($this->session->userdata('user_id') != $this->Posts_model->get_posts($slug)['user_id']){
            redirect('posts');
        }

        $data['posts'] = $this->Posts_model->get_posts($slug);
        $data['category'] = $this->Posts_model->get_categories();
        
        if(empty($data['posts'])){
            show_404();
        }

        $data['title'] = 'Edit Post';
        
        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){

        // Check if logged_in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $config['upload_path'] = './assets/images/posts';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['max_width'] = '6000';
        $config['max_height'] = '6000';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            $errors = array('error' => $this->upload->display_errors());
            $post_image = 'no_image.jpg';

        }else{
            $data = array('upload_data' => $this->upload->data());
            $post_image = $_FILES['userfile']['name'];
        }

        $this->Posts_model->update($post_image);
        //Set Message
        $this->session->set_flashdata('post_updated','You Post has been updated.');
        redirect('posts');
    }

    public function category(){

        $data['categories'] = $this->Posts_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('posts/categories', $data);
        $this->load->view('templates/footer');
    }
}
    ?>