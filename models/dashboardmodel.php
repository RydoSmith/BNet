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

    public function GetData()
    {
        $data = array();

        //Get active session count
        $data["active_sessions"] = $this->database->query('SELECT COUNT(*) FROM sessions WHERE is_active = 1')->fetchColumn();
        $data["total_sessions"] = $this->database->query('SELECT COUNT(*) FROM sessions')->fetchColumn();
        $data["total_injections"] = $this->database->query('SELECT injections FROM state WHERE id=1')->fetchColumn();

        echo json_encode($data, JSON_FORCE_OBJECT);
        exit();
    }

    public function CheckInactive()
    {
        //get all active sessions
        $sql = "UPDATE sessions SET is_active=0 WHERE is_active=1 AND last_request <= DATE_SUB(NOW(), INTERVAL 20 SECOND)";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->execute();
            $stmt->closeCursor();
        }

        echo json_encode("success");
        exit();
    }
}