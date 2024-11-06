<?php 
$host = "localhost";
$dbname= "product";
$username= "root";
$password= "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    die("Could not connect to database: " . $th->getMessage()); 
}
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
    public function addUser() {
        if (isset($_POST['signup'])) {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $address = $_POST['address'];
            $birthdate = $_POST['birthdate'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    
            try {
                $connection = $this->openConnection();
    
                // Check if username already exists
                $checkQuery = "SELECT userid FROM user WHERE username = ?";
                $stmtCheck = $connection->prepare($checkQuery);
                $stmtCheck->execute([$username]);
    
                if ($stmtCheck->rowCount() > 0) {
                    echo "Username already exists. Please choose a different username.";
                } else {
                    // Insert new user
                    $query = "INSERT INTO user (first_name, last_name, address, birthdate, gender, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $connection->prepare($query);
                    $stmt->execute([$firstName, $lastName, $address, $birthdate, $gender, $username, $password]);
    
                    // Redirect to index.php after successful registration
                    header("Location: index.php");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    



}





 ?> 

