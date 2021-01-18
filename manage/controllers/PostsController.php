<?php
class PostsController extends BaseController {
    private $posts;

    public function __construct() {
        $this->loadModel('PostModel');
        $this->posts = new PostModel();
    }

    function index() {
        $this->view("user.index", [
            'posts' => $this->posts->getAll(),
            'title' => "List posts manage"
        ]);
    }

    function add() {
        $this->view("admin.action", [
            'title' => "Add post",
            'type' => Constant::TYPE_ADD
        ]);
    }

    function edit($id) {
        $this->view("admin.action", [
            'result' => $this->posts->findById(['id', $id]),
            'title' => "Edit post",
            'type' => Constant::TYPE_EDIT
        ]);
    }

    function delete($id) {
        echo __METHOD__;
    }

    function show($id) {
        $this->view("admin.action", [
            'result' => $this->posts->findById(['id', $id]),
            'title' => "Show post",
            'type' => Constant::TYPE_SHOW
        ]);
    }
}
