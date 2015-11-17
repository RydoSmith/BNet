<?php

class Command extends BaseController
{
    public function __construct($action, $urlParams)
    {
        parent::__construct($action, $urlParams);
    }


    protected function Index($model = null)
    {
        //If user isn't logged in redirect to login,
        //if user is logged in check permissions for controller
        parent::CheckLoggedIn();

        //If model is set it means a message has been
        //added on the previous action, this is then
        //a redirect
        $model = new CommandModel("Index");

        $model->setPageTitle('Commands');
        $model->setMessage();

        $this->ReturnViewByName("index", $model->view, "layout");
    }

    protected function AddCommand()
    {
        //If user isn't logged in redirect to login,
        //if user is logged in check permissions for controller
        parent::CheckLoggedIn();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //POST
            $model = new CommandModel("AddCommand", true);

            //Error checking
            if($model->hasError())
            {
                $model->setPageTitle('Add Command');
                $this->ReturnViewByName("addcommand", $model->view, "layout");
                exit();
            }

            //No error, set success message and redirect
            $this->AddMessageToSession(MessageTypes::Success, 'Command Created', $model->view->post['name'].' has been added to the command list');
            $this->Redirect('command');
        }
        else
        {
            //GET
            $model = new CommandModel("AddCommand");

            $model->setPageTitle('Add Command');
            $this->ReturnViewByName("addcommand", $model->view, "layout");
        }
    }

    protected function EditCommand($id = null)
    {
        //If user isn't logged in redirect to login,
        //if user is logged in check permissions for controller
        parent::CheckLoggedIn();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //POST
            $model = new CommandModel("EditCommand", true);

            //Error checking
            if($model->hasError())
            {
                $model->setPageTitle('Edit Command');
                $this->ReturnViewByName("editcommand", $model->view, "layout");
                exit();
            }

            //No error, set success message and redirect
            $this->AddMessageToSession(MessageTypes::Success, 'Command Updated', 'The command '.$model->view->post['name'].'  has been updated');
            $this->Redirect('command');
        }
        else
        {
            //GET
            $model = new CommandModel("EditCommand", false, array('commandid'=>$id));

            $model->setPageTitle('Edit Command');
            $this->ReturnViewByName("editcommand", $model->view, "layout");
        }
    }

    protected function DeleteCommand()
    {
        //If user isn't logged in redirect to login,
        //if user is logged in check permissions for controller
        parent::CheckLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //POST
            $model = new CommandModel("DeleteCommand", true);

            //Error checking
            if ($model->hasError()) {
                $model->setPageTitle('Commands');
                $this->ReturnViewByName("index", $model->view, "layout");
                exit();
            }

            //No error, set success message and redirect
            $this->AddMessageToSession(MessageTypes::Success, 'Command Deleted', 'The command ' . $model->view->post['name'] . '  has been deleted');
            $this->Redirect('command');
        }
    }
}