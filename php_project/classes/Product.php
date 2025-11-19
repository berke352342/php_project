<?php
class Product {
    private $conn;

    public function __construct() {
        require_once __DIR__ . "/Database.php";
        $db = new Database();
        $this->conn = $db->conn;
    }
    public function getAll() { // it will get all products from database
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) { // it will get product by ID from database
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }

     public function destroy($id) {
          $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
          $stmt->execute([(int)$id]);
          return $stmt->rowCount(); // it return 0 or 1
      }
      
  }
 
?>
