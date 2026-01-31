<?php

namespace App\Models;

class Product extends BaseModel {

    public function __construct() {
        parent::__construct(); // QUAN TRỌNG
    }

    public function getAllProducts() {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
     public function insert($data) {
        $sql = "INSERT INTO products (name, price, description, image)
                VALUES (:name, :price, :description, :image)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':image' => $data['image']
        ]);
    } 

    public function update($id, $data) {
    $sql = "UPDATE products 
            SET name = :name, price = :price, description = :description, image = :image
            WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':name' => $data['name'],
        ':price' => $data['price'],
        ':description' => $data['description'],
        ':image' => $data['image'],
        ':id' => $id
    ]);
}
    

}
