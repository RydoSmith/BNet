<?php

class CommandModel extends BaseModel
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
        //Get current user account info
        parent::GetAccountInfo();

        //Get all commands
        $sql = "SELECT * FROM commands";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->view->commands = $row;
            $stmt->closeCursor();
        }
    }

    public function AddCommand()
    {
        parent::GetAccountInfo();
    }
    public function AddCommand_POST()
    {
        //Get current user account info
        parent::GetAccountInfo();

        //Get posted fields
        $this->view->post = array
        (
            'name' =>  $_POST['name'],
            'code' =>  $_POST['code'],
            'description' => $_POST['description']
        );

        //
        //Begin Validation
        //

        if($this->view->post['name'] == NULL)
        {
            $this->addModelError('name', new ModelError('Required'));
        }
        if($this->view->post['code'] == NULL)
        {
            $this->addModelError('code', new ModelError('Required'));
        }
        if($this->view->post['description'] == NULL)
        {
            $this->addModelError('description', new ModelError('Description is required'));
        }

        if($this->hasError()){ return; }

        //
        //End Validation
        //

        //Insert record
        $sql = "INSERT INTO commands (
          name,
          code,
          description) VALUES (
            :name,
            :code,
            :description)";

        if($stmt = $this->database->prepare($sql))
        {
            $stmt->bindParam(':name', $this->view->post['name'], PDO::PARAM_STR);
            $stmt->bindParam(':code', $this->view->post['code'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->view->post['description'], PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        }
    }

    public function EditCommand($commandid)
    {
        parent::GetAccountInfo();

        $sql = "SELECT * FROM commands WHERE id=:command_id";
        if($stmt = $this->database->prepare($sql))
        {
            $stmt->bindParam(':command_id', $commandid, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->view->post = $row;
            $stmt->closeCursor();
        }
    }
    public function EditCommand_POST()
    {
        //Get current user account info
        parent::GetAccountInfo();

        //Get posted fields
        $this->view->post = array
        (
            'id' => $_POST['id'],
            'name' =>  $_POST['name'],
            'code' =>  $_POST['code'],
            'description' => $_POST['description']
        );

        //
        //Begin Validation
        //
        if($this->view->post['name'] == NULL)
        {
            $this->addModelError('name', new ModelError('Required'));
        }
        if($this->view->post['code'] == NULL)
        {
            $this->addModelError('code', new ModelError('Required'));
        }
        if($this->view->post['description'] == NULL)
        {
            $this->addModelError('description', new ModelError('Description is required'));
        }

        if($this->hasError()){ return; }
        //
        //End Validation
        //


        //Insert record
        $sql = "UPDATE commands SET
          name=:name,
          code=:code,
          description=:description
          WHERE id=:id";

        if ($stmt = $this->database->prepare($sql)) {

            $stmt->bindParam(':name', $this->view->post['name'], PDO::PARAM_STR);
            $stmt->bindParam(':code', $this->view->post['code'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->view->post['description'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $this->view->post['id'], PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
        }
    }
    public function DeleteCommand_POST()
    {
        //Get current user account info
        parent::GetAccountInfo();

        //Get posted fields
        $this->view->post = array
        (
            'id' => $_POST['id']
        );

        //Insert record
        $sql = "DELETE FROM commands
          WHERE id=:id";

        if ($stmt = $this->database->prepare($sql)) {

            $stmt->bindParam(':id', $this->view->post['id'], PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }
}