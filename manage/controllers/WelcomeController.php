<?php
class WelcomeController extends BaseController {
    function __construct() {
        $this->index();
    }

    function index() {
        $this->view("welcome");
    }
}
