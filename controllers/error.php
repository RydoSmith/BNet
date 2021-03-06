<?php
class Error extends BaseController
{
    public function __construct($action, $urlParams)
    {
        parent::__construct($action, $urlParams);
    }

    protected function BadUrl()
    {
        $model = new ErrorModel("BadUrl");

        $model->setPageTitle("Page Doesn't Exist");
        $this->ReturnView($model->view, 'error_layout');
    }

    public function NotAuthorized()
    {
        $model = new ErrorModel("NotAuthorized");

        $model->setPageTitle("You are not authorized");
        $this->ReturnView($model->view, 'error_layout');
    }
}