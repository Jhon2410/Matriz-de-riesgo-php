<?php

// include_once '../helpers/validadorSession.php';
class Database {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "matriz";
    private static $conn;

    public static function connect() {
        self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);

        if (self::$conn->connect_error) {
            die("Conexión fallida: " . self::$conn->connect_error);
        }
    }

    public static function getConnection() {
        if (!self::$conn) {
            self::connect();
        }
        return self::$conn;
    }
}
?>
