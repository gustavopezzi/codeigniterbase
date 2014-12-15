<?php

class Login extends CustomController {
    
    var $check_session = false;


    function __construct() {
        parent::__construct();
    }


    public function index() {
        if (strpos("http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'], site_url()) === false) {
            redirect('', 'refresh');
        }

        if ($this->session->userdata(LOGGED)) {
            redirect(CMSPANELFOLDER.'start', 'refresh');
        }
        else {
            $this->load->view(CMSPANELFOLDER.'login', $this->data);
        }
    }


    public function doLogin() {
        $this->load->model('User');
        $login = $this->input->post('login');
        $password = $this->input->post('password');
      
        if (preg_match("/^[0-9a-zA-Z_.-]+$/", $password)) {
            if ($user = $this->User->doLogin($login, $password)) {
                $this->session->set_userdata(LOGGED, TRUE);
                $this->session->set_userdata('user_id', $user->user_id);
                $this->session->set_userdata('level', $user->level);
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('name', $user->name);

                $this->User->setLastLogin($user->user_id);

                if ($this->session->userdata('url') != '') {
                    redirect($this->session->userdata('url'), 'refresh');
                }
                else {
                    redirect(CMSPANELFOLDER, 'refresh');
                }
            }
            else {
                $this->setMessage("Invalid login!", true);
                $this->load->view(CMSPANELFOLDER.'login', $this->data);
            }
        }
        else {
            $this->setMessage("Invalid login!", true);
            $this->load->view(CMSPANELFOLDER.'login', $this->data);
        }
    }


    public function doLogout() {
        $this->session->sess_destroy();
        redirect(CMSPANELFOLDER, 'refresh');
    }
}