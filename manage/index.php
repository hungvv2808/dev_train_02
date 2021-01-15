<?php
// require function base
require './util/ConnectUtil.php';
require './models/BaseModel.php';
require './controllers/BaseController.php';

// variable param
$controllerRequest = $_REQUEST['controller'];
$actionRequest = $_REQUEST['action'];
// get param to redirect and action
$controllerName = ucfirst($controllerRequest === null ? 'Welcome' : strtolower($controllerRequest)) . 'Controller';
$actionName = $actionRequest === null ? 'index' : strtolower($actionRequest);
// require controller by param
require "./controllers/${controllerName}.php";

// call method(action) from controller
$controllerObj = new $controllerName;
$controllerObj->$actionName();