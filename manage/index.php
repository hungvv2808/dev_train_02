<?php
// require function base
require './util/ConnectUtil.php';
require './models/BaseModel.php';
require './controllers/BaseController.php';

// variable param
$controllerRequest = $_REQUEST['controller'];
$actionRequest = $_REQUEST['action'];
$idRequest = $_REQUEST['id'];
// get param to redirect and action
$controllerName = ucfirst($controllerRequest === null ? 'Posts' : strtolower($controllerRequest)) . 'Controller';
$actionName = $actionRequest === null ? 'index' : strtolower($actionRequest);
// require controller by param
require "./controllers/${controllerName}.php";

// call method(action) from controller
$controllerObj = new $controllerName;

if ($idRequest === null) {
    $controllerObj->$actionName();
} else {
    $controllerObj->$actionName($idRequest);
}

if (isset($_POST['save'])) {
    $data = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_POST['image'],
        'status' => $_POST['status']
    ];
    print_r($data);
}