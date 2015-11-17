<?php

class Account extends BaseController
{
    public function __construct($action, $urlParams)
    {
        parent::__construct($action, $urlParams);
    }

    /* LOGIN */
    protected function Login()
    {
        //If user is logged in redirect to dashboard
        if(parent::IsLoggedIn())
        {
            parent::Redirect('dashboard');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //POST
            $model = new AccountModel("Login", true);

            //Error checking
            if($model->hasError())
            {
                $model->setPageTitle('Login');
                $this->ReturnViewByName("login", $model->view, "login_layout");
                exit();
            }

            $this->Redirect('dashboard');
        }
        else
        {
            //GET
            $model = new AccountModel("Login");

            $model->setPageTitle('Login');
            $this->ReturnViewByName("login", $model->view, "login_layout");
        }
    }

    /* LOGOUT */
    protected function Logout()
    {
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies"))
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        header('Location: /');
        $this->Redirect('login');
    }
}