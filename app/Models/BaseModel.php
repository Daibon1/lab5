<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel {
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;dbname=buoi2_php;charset=utf8",
                "root",
                ""
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối DB: " . $e->getMessage());
        }
    }
}
