<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['module'] = 'Dashboard';
        $this->data['submodule'] = 'Dashboard';
        $this->data['page'] = 'Dashboard';
        if ($this->session->userdata('logindata')) {

        } else {
            redirect('auth');
        }
    }
    function response($arr = array())
    {
        die(json_encode($arr));
    }

}