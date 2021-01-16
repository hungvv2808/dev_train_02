<?php
include "../util/Constant.php";
class BaseController {
    const VIEWS_RESOURCE = 'views';
    const MODELS_RESOURCE = 'models';

    protected function
    view($viewPath, array $data = []) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require (self::VIEWS_RESOURCE . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    protected function loadModel($modelPath) {
        require (self::MODELS_RESOURCE . '/' . $modelPath . '.php');
    }
}
