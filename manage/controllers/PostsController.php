<?php
class PostsController extends BaseController {
    private $posts;

    public function __construct() {
        $this->loadModel('PostModel');
        $this->posts = new PostModel();
    }

    function index($start, $limit) {
        $this->view("user.index", [
            'posts' => $this->posts->getAll(['*'], ['name' => 'id', 'DESC'], $start, $limit),
            'title' => "List posts manage",
            'records' => $this->posts->countId()
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

    function delete($id, $start, $limit) {
        $this->view("user.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->deleteById(['id', $id]) ? "Delete post ${id} completed !!!" : "Delete post ${id} failed !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(['*'], ['name' => 'id', 'DESC'], $start, $limit)
        ]);
    }

    function show($id) {
        $this->view("admin.action", [
            'result' => $this->posts->findById(['id', $id]),
            'title' => "Show post",
            'type' => Constant::TYPE_SHOW
        ]);
    }

    function save($data, $start, $limit) {
        $this->view("user.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->insertData($data) ? "Save completed !!!" : "Save error !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(['*'], ['name' => 'id', 'DESC'], $start, $limit)
        ]);
    }

    function update($data, $start, $limit) {
        $this->view("user.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->updateData($data) ? "Update completed !!!" : "Update error !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(['*'], ['name' => 'id', 'DESC'], $start, $limit)
        ]);
    }
}
