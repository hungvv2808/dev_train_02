<?php
class BaseModel extends ConnectUtil {
    protected $connect;

    public function __construct() {
        $this->connect = $this->connectDb();
    }

    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }

    public function all($tableName, $select, $orderBy, $limit) {
        $columns = implode(', ', $select);
        $orderBys = implode(' ', $orderBy);
        $sql = "SELECT ${columns} FROM ${tableName} ORDER BY ${orderBys} LIMIT ${limit}";
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

    public function insert($data) {

    }

    public function update($data) {

    }

    public function delete($tableName, $condition) {
        $sql = "DELETE FROM ${tableName} WHERE ${condition}";
        $this->connect->query($sql);
    }
}