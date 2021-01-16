<?php
include "../util/Constant.php";
class BaseController {
    protected function
    view($viewPath, array $data = []) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require (Constant::VIEWS_RESOURCE . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    protected function loadModel($modelPath) {
        require (Constant::MODELS_RESOURCE . '/' . $modelPath . '.php');
    }
}
