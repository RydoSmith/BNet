<?php

abstract class BaseController
{
    protected $action, $urlValues, $urlParams;
    public $htmlHelper;

    public function __construct($action, $urlParams)
    {
        $this->action = $action;
        $this->urlParams = $urlParams;
        $this->htmlHelper = new HTMLHelper();

        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function ExecuteAction()
    {
        if(!isset($this->urlParams))
        {
            $this->urlParams = array();
        }

        return call_user_func_array(array($this, $this->action), $this->urlParams);
    }

    //Views and Redirects
    protected function ReturnView($model, $layoutname = "layout")
    {

        $location = 'views/'.strtolower(get_class($this)).'/'.strtolower($this->action).'.php';

        if($layoutname)
        {
            require('views/shared/layouts/'.$layoutname.'.php');
        }
        else
        {
            require($location);
        }
    }
    protected function ReturnViewByName($name, $model, $layoutname = "layout")
    {

        $location = 'views/'.strtolower(get_class($this)).'/'.$name.'.php';

        if($layoutname)
        {
            require('views/shared/layouts/'.$layoutname.'.php');
        }
        else
        {
            require($location);
        }
    }
    protected function RedirectToAction($name, $model)
    {
        $this->action = $name;
        $this->{$this->action}($model);
    }
    protected function Redirect($controller = '', $action = '')
    {
        if($controller == '' && $action == '')
        {
            header('Location: /');
        }
        else if($action == '')
        {
            header('Location: /'.$controller);
        }
        else
        {
            header('Location: /'.$controller.'/'.$action);
        }
    }

    //Account functions
    protected function IsLoggedIn()
    {
        //echo '<pre>'; print_r($_SESSION); exit();

        if(isset($_SESSION) &&
            isset($_SESSION['LoggedIn']) &&
            $_SESSION['LoggedIn'] == 1 &&
            isset($_SESSION['Username']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function CheckLoggedIn()
    {
        $loggedIn = $this::IsLoggedIn();
        if(!$loggedIn)
        {
            $this::Redirect('Account', 'Login');
        }
    }

    //Messages
    protected function AddMessageToSession($type, $title, $body)
    {
        $_SESSION['MessageType'] = $type;
        $_SESSION['MessageTitle'] = $title;
        $_SESSION['MessageBody'] = $body;
    }
}

