<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function index(){

        $data['categories'] = $this->Posts_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
            
        // Check if logged_in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = "Create Category";

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        
        }else{

            $this->Category_model->create_category();
            //Set Message
            $this->session->set_flashdata('category_created','You Category has been created.');
            redirect('categories');
        }

    }

    public function posts($id){

        $data['title'] = $this->Category_model->get_category($id)->name;
        $data['posts'] = $this->Posts_model->get_posts_by_category($id);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');

    }

}

