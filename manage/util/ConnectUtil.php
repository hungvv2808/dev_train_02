<?php
class ConnectUtil {
    const HOST = "127.0.0.1";
    const USER = "root";
    const PASSWORD = "1111";
    const DB = "dev_train";

    public function connectDb() {
        $connect = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DB);
        mysqli_set_charset($connect, 'utf8');
        if (mysqli_connect_errno() === 0) {
            return $connect;
        }
        return false;
    }
}