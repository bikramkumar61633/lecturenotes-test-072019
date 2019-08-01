<?php
class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ActivitiesModel', 'activities');
    }
    /**
     * Load the dashboard page
     */
    function index()
    {
        $this->data['todays'] = $this->activities->getTodays();
        $this->template->load("Admin", "Dashboard", $this->data);
    }
    function test()
    {

    }
}