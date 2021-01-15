<?php
class ConnectUtil {
    public function connectDb() {
        $connect = mysqli_connect(Constant::$HOST, Constant::$USER, Constant::$PASSWORD, Constant::$DB);
        mysqli_set_charset($connect, 'utf8');
        if (mysqli_connect_errno() === 0) {
            return $connect;
        }
        return false;
    }
}