<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['module'] = 'Dashboard';
        $this->data['submodule'] = 'Dashboard';
        $this->data['page'] = 'Dashboard';
    }

}