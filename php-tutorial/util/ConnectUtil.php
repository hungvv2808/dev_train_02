<?php
class ConnectUtil {
    public static function connectMysqli()
    {
        $conn = mysqli_connect(Constant::$HOST, Constant::$USER, Constant::$PASSWORD, Constant::$DB);
        return $conn != null ? $conn : '';
    }
}