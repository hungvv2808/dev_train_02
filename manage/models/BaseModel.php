<?php
class BaseModel extends ConnectUtil {
    protected $connect;

    public function __construct() {
        $this->connect = $this->connectDb();
    }
}