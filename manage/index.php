<?php
// require function base
require './util/ConnectUtil.php';
require './models/BaseModel.php';
require './controllers/BaseController.php';

session_start();

// variable param
$limit = 0;
if (isset($_SESSION['limit'])) {
    $limit = $_SESSION['limit'];
} else {
    $limit = Constant::RECORDS_LIMIT;
    $_SESSION['limit'] = $limit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$_SESSION['page'] = $page;

$idRequest = $_REQUEST['id'];
$actionRequest = $_REQUEST['action'];
$controllerRequest = $_REQUEST['controller'];
$roleRequest = $_REQUEST['role'];

// get param to redirect and action
$controllerName = ucfirst($controllerRequest === null ? 'Posts' : strtolower($controllerRequest)) . 'Controller';
$actionName = $actionRequest === null ? 'index' : strtolower($actionRequest);
$roleName = $roleRequest === null ? 'user' : strtolower($roleRequest);
// require controller by param
require "./controllers/${controllerName}.php";

// call method(action) from controller
$controllerObj = new $controllerName;

$data = array();
$actionSave = '';
$imageDefault = $_SESSION['image_default'];

if (isset($_POST['save'])) {
    unset($data);
    $data = array();
    $actionSave = 'save';

    $target = '';
    if (!empty($_FILES['image']['name'])) {
        $imagePath = time() . '_' . $_FILES['image']['name'];
        $target = Constant::RESOURCE_PATH . '/target/' . $imagePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $target = Constant::IMAGE_PATH_NO_IMAGE;
    }

    $data = [
        'title' => (string)$_POST['title'],
        'description' => (string)$_POST['description'],
        'image' => (string)$target,
        'status' => (int)$_POST['status'],
        'create_at' => (new DateTime())->format(Constant::DATE_TIME_FORMAT),
        'update_at' => (new DateTime())->format(Constant::DATE_TIME_FORMAT)
    ];
}
if (isset($_POST['update'])) {
    unset($data);
    $data = array();
    $actionSave = 'update';

    $target = '';
    if (!empty($_FILES['image']['name'])) {
        $imagePath = time() . '_' . $_FILES['image']['name'];
        $target = Constant::RESOURCE_PATH . '/target/' . $imagePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $target = $imageDefault;
    }

    $data = [
        'id' => (int)$_POST['id'],
        'title' => (string)$_POST['title'],
        'description' => (string)$_POST['description'],
        'image' => (string)$target,
        'status' => (int)$_POST['status'],
        'update_at' => (new DateTime())->format(Constant::DATE_TIME_FORMAT)
    ];
}

//$controllerObj->destroy();
if (!isset($_SESSION['init'])) {
    $controllerObj->destroy();
    $_SESSION['init'] = true;
}

if ($idRequest === null) {
    if ($actionName === 'add') {
        $controllerObj->$actionName($roleName);
    } else {
        $controllerObj->$actionName($roleName, $start, $limit);
    }
} else {
    if (empty($data)) {
        $controllerObj->$actionName($roleName, $idRequest, $start, $limit);
    } else {
        $controllerObj->$actionSave($roleName, $data, $start, $limit);
    }
}