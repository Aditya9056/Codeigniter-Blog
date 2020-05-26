<?php 

    class User_model extends CI_Model{

        public function __construct(){
            parent::__construct();
            {
                $this->load->database();
            }
        }

        public function check_email_exists($email){

            $query = $this->db->get_where('users', array('email' => $email));
            
            if(empty($query->row_array())){
                return true;
            }else {
                return false;
            }
        }
        
        public function register($enc_password){
            
            //User Data Array
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password'=> $enc_password
            );

            //Insert
            return $this->db->insert('users', $data);

        }    

        public function login($email, $password){

            $query = $this->db->get_where('users', array(
                'email' => $email,
                'password' => $password
            ));

            if(empty($query->row_array())){

                return false;
            }else {
                $data = array(
                    'name' => $query->row('name'),
                    'id' => $query->row('id')
                );
                return $data;
            }

        }
    }