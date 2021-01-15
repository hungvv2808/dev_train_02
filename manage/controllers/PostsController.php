<?php
class PostsController extends BaseController {
    private $posts;

    public function __construct() {
        $this->loadModel('PostModel');
        $this->posts = new PostModel();
    }

    function index() {
        $title = "List posts manage";
        $this->view("user.posts", [
            'posts' => $this->posts->getAll(),
            'title' => $title
        ]);
    }

    function show() {
        echo '<h1>K2 Bravo show</h1>';
    }
}
