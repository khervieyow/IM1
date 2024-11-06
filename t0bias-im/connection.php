<?php

class Connection {
    private $server = "mysql:host=localhost;dbname=product";
    private $user = "root";
    private $pass = "";
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    protected $con;

    public function openConnection() {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $th) {
            echo "There is a problem in the connection: " . $th->getMessage();
            exit; 
        }
    }

    public function closeConnection() {
        $this->con = null;
    }

    public function getCategories() {
        $connection = $this->openConnection();
        $query = "SELECT * FROM categories";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoryIDByName($category_name) {
        $connection = $this->openConnection();
        $query = "SELECT category_id FROM categories WHERE category_name = :category_name";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function addProduct() {
        if (isset($_POST['addproduct'])) {
            $category_id = $_POST['category_id'];
            $productname = $_POST['productname'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $date_purchase = $_POST['date_purchase'];
            $expiry_date = $_POST['expiry_date'];

            try {
                $connection = $this->openConnection();
                $query = "INSERT INTO products_table (category_id, productname, price, quantity, date_purchase, expiry_date) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($query);
                $stmt->execute([ $category_id,$productname, $price, $quantity, $date_purchase, $expiry_date]);
            } catch (PDOException $th) {
                echo "Error: " . $th->getMessage();
            }
        }
    }

    public function deleteProduct() {
        if (isset($_POST['delete_product'])) {
            $id = $_POST['delete_product'];
            try {
                $connection = $this->openConnection();
                $query = "DELETE FROM products_table  WHERE id = :id";
                $stmt = $connection->prepare($query);
                $stmt->execute(["id" => $id]);

                if ($stmt->rowCount()) {
                    echo '<script>alert("Deleted")</script>';
                }
            } catch (PDOException $th) {
                echo "Error: " . $th->getMessage();
            }
        }
    }

    public function updateProduct() {
        if (isset($_POST['updateproduct'])) {
            $id = $_POST['id'];
            $category_id = $_POST['category_id'];
            $productname = $_POST['productname'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $date_purchase = $_POST['date_purchase'];
            $expiry_date = $_POST['expiry_date'];
            

            try {
                $connection = $this->openConnection();
                $query = "UPDATE products_table  SET category_id = :category_id, productname = :productname, price = :price, quantity = :quantity, date_purchase = :date_purchase, expiry_date = :expiry_date WHERE id = :id";
                $stmt = $connection->prepare($query);
                $stmt->execute([
                    ':category_id' => $category_id,
                    ':productname' => $productname,
                    ':price' => $price,
                    ':quantity' => $quantity,
                    ':date_purchase' => $date_purchase,
                    ':expiry_date' => $expiry_date,
                    ':id' => $id
                ]);
            } catch (PDOException $th) {
                echo "Error: " . $th->getMessage();
            }
        }
    }
}
?>
