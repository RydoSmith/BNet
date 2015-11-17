<?php

    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);

    //Require base classes
    require_once 'common/loader.php';
    require_once 'common/basecontroller.php';
    require_once 'common/basemodel.php';
    require_once 'common/modelerror.php';
    require_once 'common/messagetypes.php';
    require_once 'common/displaytypes.php';


    //Require helpers
    require_once 'helpers/htmlhelper.php';

    //Require models
    require_once 'models/errormodel.php';
    require_once 'models/accountmodel.php';
    require_once 'models/dashboardmodel.php';
    require_once 'models/commandmodel.php';

    //Require controllers
    require_once 'controllers/error.php';
    require_once 'controllers/account.php';
    require_once 'controllers/dashboard.php';
    require_once 'controllers/command.php';

    //create controllers and execute the action
    $loader = new Loader($_GET);

    $controller = $loader->CreateController();
    $controller->ExecuteAction();

