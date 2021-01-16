<?php
class PostModel extends BaseModel {
    const TABLE = 'posts';

    public function getAll() {
        return $this->all(self::TABLE);
    }

    public function findById($id) {
        echo __METHOD__;
    }

    public function insertData($data) {

    }

    public function updateData($data) {

    }

    public function deleteById($id) {
        echo __METHOD__;
    }
}
