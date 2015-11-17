<?php

class DashboardModel extends BaseModel
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

    /* Index  */
    public function Index()
    {
        parent::GetAccountInfo();

        //get all commands
        $sql = "SELECT * FROM commands";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->view->commands = $row;
            $stmt->closeCursor();
        }

        //get current state command id
        $command_id = null;
        $sql = "SELECT command_id FROM state LIMIT 1";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $command_id = $row['command_id'];
            $stmt->closeCursor();
        }

        //get current command
        $sql = "SELECT * FROM commands WHERE id=:command_id";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->bindParam(':command_id', $command_id, PDO::PARAM_STR);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->view->current_command = $row;
            $stmt->closeCursor();
        }
    }
}