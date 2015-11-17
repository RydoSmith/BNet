<?php

class AccountModel extends BaseModel
{
    public function __construct($action, $isPost = false, $params = array())
    {
        parent::__construct(include('conf/config.php'));
        if($isPost)
        {
            call_user_func_array(array($this, $action.'_POST'), $params);
        }
        else
        {
            call_user_func_array(array($this, $action), $params);
        }
    }

    /* LOGIN */
    public function Login()
    {

    }
    public function Login_POST()
    {
        $u = $_POST['username'];
        $p = $_POST['password'];

        //MODEL VALIDATION
        if(!isset($u) || $u == '')
        {
            $this->addModelError('username', new ModelError('Username is required.'));
            return;
        }

        if(!isset($p) || $p == '')
        {
            $this->addModelError('password', new ModelError('Password is required.'));
            return;
        }

        $sql = 'SELECT password FROM users WHERE username=:u';
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->bindParam(':u', $u, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();

            if($row['password'] != sha1($p))
            {
                $this->addModelError('error', new ModelError('Incorrect details. Have you your password?'));
                return;
            }

            //Everything is good, log the user in.
            session_start();

            //Login
            $_SESSION['Username'] = $u;
            $_SESSION['LoggedIn'] = 1;
        }
    }

}