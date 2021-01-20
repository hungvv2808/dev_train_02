<?php
class PostsController extends BaseController {
    private $posts;

    public function __construct() {
        $this->loadModel('PostModel');
        $this->posts = new PostModel();
    }

    function index($role, $start, $limit) {
        $this->view("${role}.index", [
            'posts' => $this->posts->getAll(
                $role == Constant::ROLE_ADMIN ? ['*'] : ['id', 'title', 'description', 'image'],
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE],
                ['name' => 'id', 'DESC'],
                $start,
                $limit
            ),
            'title' => $role == Constant::ROLE_ADMIN ? "List posts manage" : "List posts",
            'records' => $this->posts->countId(
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE]
            ),
            'role' => $role
        ]);
    }

    function add($role) {
        $this->view("${role}.action", [
            'title' => "Add post",
            'type' => Constant::TYPE_ADD
        ]);
    }

    function edit($role, $id) {
        $this->view("${role}.action", [
            'result' => $this->posts->findById(['column' => 'id', $id]),
            'title' => "Edit post",
            'type' => Constant::TYPE_EDIT
        ]);
    }

    function delete($role, $id, $start, $limit) {
        $this->view("${role}.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->deleteById(['column' => 'id', $id]) ? "Delete post ${id} completed !!!" : "Delete post ${id} failed !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(
                $role == Constant::ROLE_ADMIN ? ['*'] : ['id', 'title', 'description', 'image'],
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE],
                ['name' => 'id', 'DESC'],
                $start,
                $limit
            ),
            'records' => $this->posts->countId(
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE]
            ),
            'role' => $role
        ]);
    }

    function show($role, $id) {
        $this->view("${role}.action", [
            'result' => $this->posts->findById(['column' => 'id', $id]),
            'title' => "Show post",
            'type' => Constant::TYPE_SHOW
        ]);
    }

    function save($role, $data, $start, $limit) {
        $this->view("${role}.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->insertData($data) ? "Save completed !!!" : "Save error !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(
                $role == Constant::ROLE_ADMIN ? ['*'] : ['id', 'title', 'description', 'image'],
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE],
                ['name' => 'id', 'DESC'],
                $start,
                $limit
            ),
            'records' => $this->posts->countId(
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE]
            ),
            'role' => $role
        ]);
    }

    function update($role, $data, $start, $limit) {
        $this->view("${role}.index", [
            'title' => "List posts manage",
            'msg' => $this->posts->updateData($data) ? "Update completed !!!" : "Update error !!!",
            'css' => "alert-success",
            'posts' => $this->posts->getAll(
                $role == Constant::ROLE_ADMIN ? ['*'] : ['id', 'title', 'description', 'image'],
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE],
                ['name' => 'id', 'DESC'],
                $start,
                $limit
            ),
            'records' => $this->posts->countId(
                $role == Constant::ROLE_ADMIN ? ['condition' => 1, 1] : ['condition' => 'status', Constant::STATUS_ENABLE]
            ),
            'role' => $role
        ]);
    }

    function destroy() {
        $this->posts->_destroy();
    }
}
