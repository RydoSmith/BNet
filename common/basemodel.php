<?php

abstract class BaseModel
{
    protected $database, $config;
    public $view;

    public function __construct($config)
    {
        $this->config = $config;
        $this->database = $this->getDatabaseConnection($config);

        $this->view = new stdClass();
        $this->view->modelErrors = array();
        $this->view->hasError = false;
    }

    function getDatabaseConnection($config) {
        static $dbLink;
        if (!($dbLink instanceof PDO)) {
            try {
                $dsn = "mysql:host=".$config['db_location'].";dbname=".$config['db_name'];
                $dbLink = new PDO($dsn, $config['db_user'], $config['db_pass']);
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return $dbLink;
    }

    public function AddModelError($field, $modelError)
    {
        $this->view->modelErrors[$field] = $modelError;
    }
    public function hasError()
    {
        return count($this->view->modelErrors) > 0 ? true : false;
    }
    public function add($property, $value)
    {
        $this->view->$property = $value;
    }

    //META DATA
    public function setPageTitle($x)
    {
        $this->view->pageTitle = $x;
    }

    //MESSAGES
    public function SetMessage()
    {
        if(isset($_SESSION['MessageType']) && isset($_SESSION['MessageTitle']) && isset($_SESSION['MessageBody']))
        {
            $type = $_SESSION['MessageType'];
            $title = $_SESSION['MessageTitle'];
            $body = $_SESSION['MessageBody'];

            switch($type)
            {
                case MessageTypes::Success:
                    $this->SetSuccessMessage($_SESSION['MessageTitle'], $_SESSION['MessageBody']);
                    break;
                case MessageTypes::Error:
                    $this->SetErrorMessage($_SESSION['MessageTitle'], $_SESSION['MessageBody']);
                    break;
                case MessageTypes::Info:
                    $this->SetInfoMessage($_SESSION['MessageTitle'], $_SESSION['MessageBody']);
                    break;
                case MessageTypes::Warning:
                    $this->SetWarningMessage($_SESSION['MessageTitle'], $_SESSION['MessageBody']);
                    break;
            }


            unset($_SESSION['MessageType ']);
            unset($_SESSION['MessageTitle']);
            unset($_SESSION['MessageBody']);
        }
    }
    public function SetSuccessMessage($title, $message)
    {
        $this->view->message =  '<div class="alert alert-dismissable alert-success"><i class="ti ti-check"></i>&nbsp; <strong>'.$title.'</strong> '.$message.'.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    }
    public function SetErrorMessage($title, $message)
    {
        $this->view->message =  '<div class="alert alert-dismissable alert-danger"><i class="ti ti-close"></i>&nbsp; <strong>'.$title.'</strong> '.$message.'.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    }
    public function SetWarningMessage($title, $message)
    {
        $this->view->message =  '<div class="alert alert-dismissable alert-warning"><i class="ti ti-alert"></i>&nbsp; <strong>'.$title.'</strong> '.$message.'.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    }
    public function SetInfoMessage($title, $message)
    {
        $this->view->message =  '<div class="alert alert-dismissable alert-info"><i class="ti ti-info-alt"></i>&nbsp; <strong>'.$title.'</strong> '.$message.'.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    }

    //User
    public function getUserID()
    {
        if(isset($_SESSION) && $_SESSION['LoggedIn'] == 1 && isset($_SESSION['Username']))
        {
            $sql = "SELECT id FROM users WHERE username=:u LIMIT 1";
            if($stmt = $this->database->prepare($sql))
            {
                $stmt->bindParam(':u', $_SESSION['Username'], PDO::PARAM_STR);
                $stmt->execute();
                $id = $stmt->fetch()['id'];
                $stmt->closeCursor();
                return $id;
            }
        }
        else
        {
            return null;
        }
    }
    public function GetAccountInfo()
    {
        return $_SESSION['Username'];
    }



}