<?php
class PostModel extends BaseModel {
    const TABLE = 'posts';

    public function getAll() {
        return [
            [
                'id' => 1,
                'name' => 'test 1'
            ],
            [
                'id' => 2,
                'name' => 'test 2'
            ],
            [
                'id' => 3,
                'name' => 'test 3'
            ],
            [
                'id' => 4,
                'name' => 'test 4'
            ]
        ];
    }

    public function findById($id) {
        return __METHOD__;
    }

    public function deleteById() {
        return __METHOD__;
    }
}
