<?php
class PostsController extends BaseController {
    private $posts;

    public function __construct() {
        $this->loadModel('PostModel');
        $this->posts = new PostModel();
    }

    function index() {
        $title = "List posts manage";
        $this->view("user.index", [
            'posts' => $this->posts->getAll(),
            'title' => $title
        ]);
    }

    function add() {
        $this->view("admin.add");
    }
}
