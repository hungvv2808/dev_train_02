<?php
class PostModel extends BaseModel {
    const TABLE = 'posts';

    public function countId($condition = ['condition' => 1, 1]) {
        return $this->count(self::TABLE, $condition);
    }

    public function getAll($select = ['*'], $condition = ['condition' => 1, 1], $orderBy = ['name' => 'id', 'DESC'], $start = 1, $limit = 10) {
        return $this->all(self::TABLE, $select, $condition, $orderBy, $start, $limit);
    }

    public function findById($condition) {
        $conditionStr = implode(' = ', $condition);
        return $this->find(self::TABLE, $conditionStr);
    }

    public function insertData($data) {
        $key_new = implode(', ', array_keys($data));
        return $this->insert(self::TABLE, $key_new, $data);
    }

    public function updateData($data) {
        return $this->update(self::TABLE, $data);
    }

    public function deleteById($condition) {
        $conditionStr = implode(' = ', $condition);
        return $this->delete(self::TABLE, $conditionStr);
    }
}
