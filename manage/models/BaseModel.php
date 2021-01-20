<?php
class BaseModel extends ConnectUtil {
    protected $connect;

    public function __construct() {
        $this->connect = $this->connectDb();
    }

    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }

    public function count($tableName, $condition) {
        $conditions = implode(' = ', $condition);
        $sql = "SELECT COUNT(DISTINCT id) FROM ${tableName} WHERE ${conditions}";
        $data = $this->connect->query($sql)->fetch_array();
        return $data[0];
    }

    public function all($tableName, $select, $condition, $orderBy, $start, $limit) {
        $columns = implode(', ', $select);
        $conditions = implode(' = ', $condition);
        $orderBys = implode(' ', $orderBy);
        $sql = "SELECT ${columns} FROM ${tableName} WHERE ${conditions} ORDER BY ${orderBys} LIMIT ${start}, ${limit}";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function find($tableName, $condition) {
        $sql = "SELECT * FROM ${tableName} WHERE ${condition} LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function insert($tableName, $key, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $image = $data['image'];
        $status = $data['status'];
        $create_at = $data['create_at'];
        $update_at = $data['update_at'];

        $sql = "INSERT INTO ${tableName}(${key}) VALUES ('"
            . $title
            . "', '"
            . $description
            . "', '"
            . $image
            . "', "
            . $status
            . ", '"
            . $create_at
            . "', '"
            . $update_at
            . "')";
        return $this->connect->query($sql);
    }

    public function update($tableName, $data) {
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];
        $image = $data['image'];
        $status = $data['status'];
        $update_at = $data['update_at'];

        $sql = "UPDATE ${tableName} SET 
                 title = '" . $title . "', 
                 description = '" . $description . "',
                 image = '" . $image . "',
                 status = " . $status . ",
                 update_at = '" . $update_at . "'
                WHERE id = " . $id . "
               ";
        return $this->connect->query($sql);
    }

    public function delete($tableName, $condition) {
        $sql = "DELETE FROM ${tableName} WHERE ${condition}";
        return $this->connect->query($sql);
    }
}