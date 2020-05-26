<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

    
    //Check If email exists
    function check_email_exists($email){
        
        $this->form_validation->set_message('check_email_exists', 'That email is already registered.');      
        if($this->User_model->check_email_exists($email)){
            return true;
        }else{
            return false;
        }

    }

    public function register(){
        $data['title'] = "Sign Up";

        
        //Check Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
    
        } else{

            $enc_password = md5($this->input->post('password'));
            $this->User_model->register($enc_password);

            //Set Message
            $this->session->set_flashdata('user_registered','You are now registered and log in.');
            redirect('posts');
        }
    }

    public function login(){

        $data['title'] = "User Login";

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
    
        } else{

            $email= $this->input->post('email');
            $enc_password = md5($this->input->post('password'));

            //Login User
            $user_data = $this->User_model->login($email, $enc_password);

            if($user_data === FALSE){

                //Set Message
                $this->session->set_flashdata('user_login_failed','Invalid login details.');
                redirect('users/login');

            } else{

                $user_data = array(
                    'user_id' => $user_data['id'],
                    'name' => $user_data['name'],
                    'email' => $email,
                    'logged_in' =>'true'
                );

                $this->session->set_userdata($user_data);

                // //Set Message
                $this->session->set_flashdata('user_logged_in','You are now logged in.');
                redirect('posts');
            }
        }
    }

    public function logout(){

        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        
        //Set Message
        $this->session->set_flashdata('user_logged_out','You have successfully logged out.');
        redirect('posts');
    }


}