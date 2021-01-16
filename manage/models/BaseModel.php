<?php
class BaseModel extends ConnectUtil {
    protected $connect;

    public function __construct() {
        $this->connect = $this->connectDb();
    }

    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }

    public function all($tableName) {
        $sql = "SELECT * FROM ${tableName}";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function find($id) {

    }

    public function insert($data) {

    }

    public function update($data) {

    }

    public function delete($id) {

    }
}