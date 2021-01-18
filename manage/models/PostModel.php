<?php
class PostModel extends BaseModel {
    const TABLE = 'posts';

    public function getAll($select = ['*'], $orderBy = ['name' => 'id', 'DESC'], $limit = 10) {
        return $this->all(self::TABLE, $select, $orderBy, $limit);
    }

    public function findById($condition) {
        $conditionStr = implode(' = ', $condition);
        return $this->find(self::TABLE, $conditionStr);
    }

    public function insertData($data) {

    }

    public function updateData($data) {

    }

    public function deleteById($condition) {
        $conditionStr = implode(' = ', $condition);
        $this->delete(self::TABLE, $conditionStr);
    }
}
