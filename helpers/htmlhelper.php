<?php

class HTMLHelper
{
    public function __construct()
    {

    }

    public function DisplayErrorFor($m, $field)
    {
        if(isset($m) && isset($m->modelErrors[$field]))
        {
            echo '<p class="help-block" style="display: block"><i class="fa fa-times-circle"></i>'.$m->modelErrors[$field]->message.'</p>';
        }
    }

    public function FieldHasError($m, $field)
    {
        if(isset($m) && isset($m->modelErrors[$field]))
        {
            return 'has-error';
        }
    }

    public function IsSelected($field, $value)
    {
        if($field == $value)
        {
            echo "selected=\"selected\"";
        }
    }

    public function DisplayValueFor($m, $field)
    {
        if(isset($m) && isset($m->post) && isset($m->post[$field]) && $m->post[$field] != null)
        {
            echo 'value="'.$m->post[$field].'"';
        }
    }

    public function DisplayTextareaValueFor($m, $field)
    {
        if(isset($m) && isset($m->post) && isset($m->post[$field]) && $m->post[$field] != null)
        {
            echo $m->post[$field];
        }
    }

    public function GetAssociativeArrayByIndex($array, $index)
    {
        if(isset($array))
        {
            $keys = array_keys($array);
            if(isset($array[$keys[$index]]) && isset($array[$keys[$index]]->wizardPage))
            {
                echo $array[$keys[$index]]->wizardPage;
            }
        }
    }

    public static function GetRoleDescription($role)
    {
        switch($role)
        {
            case "AU":
                return "Admin";
                break;
            case "SU":
                return "Sales";
                break;
            case "PM":
                return "Project Manager";
                break;
            case "SUPM":
                return "Sales/Project Manager";
                break;
            case "CU":
                return "Client";
                break;
        }
    }

}