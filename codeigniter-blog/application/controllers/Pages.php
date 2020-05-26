<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['heading'] = "My Real Heading";
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}
