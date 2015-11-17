<?php

class Dashboard extends BaseController
{
    public function __construct($action, $urlParams)
    {
        parent::__construct($action, $urlParams);
    }


    protected function Index()
    {
        //If user isn't logged in redirect to login,
        //if user is logged in check permissions for controller
        parent::CheckLoggedIn();

        $model = new DashboardModel("Index");

        $model->setPageTitle('Dashboard');
        $this->ReturnViewByName("index", $model->view, "layout");
    }
}