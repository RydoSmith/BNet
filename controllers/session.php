<?php
class Session extends BaseController
{
    public function __construct($action, $urlParams)
    {
        parent::__construct($action, $urlParams);
    }


    protected function Index($model = null)
    {
        //ToDO
        //Create session
        $model = new SessionModel('Index');

        //Return session init javascript
        header('Content-type: text/javascript');

        echo "setInterval(function(){
            var xmlhttp;
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject(\"Microsoft.XMLHTTP\");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
                   if(xmlhttp.status == 200){
                       eval(xmlhttp.responseText);

                       window.onbeforeunload = function(){
                            xmlhttp.open(\"GET\", \"http://192.168.1.6/session/end/".$model->session_id."\", true);
                            xmlhttp.send();
                        };

                        window.onunload = function(){
                            xmlhttp.open(\"GET\", \"http://192.168.1.6/session/end/".$model->session_id."\", true);
                            xmlhttp.send();
                        };
                   }
                }
            }

            xmlhttp.open(\"GET\", \"http://192.168.1.6/session/active/".$model->session_id."\", true);
            xmlhttp.send();

        }, 3000);";
        exit();
    }

    protected function Active($session_id)
    {
        //Update session && Get current payload from state
        $model = new SessionModel('Active', false, array('session_id' => $session_id));

        //Return session payload javascript
        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/javascript');
        echo "$model->payload";
        exit();
    }

    protected function End($session_id)
    {
        //End the session
        $model = new SessionModel('End', false, array('session_id' => $session_id));

        //Return session payload javascript
        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/javascript');
        exit();
    }
}