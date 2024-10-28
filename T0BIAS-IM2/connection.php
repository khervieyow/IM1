<?php
$newconnection = new Connection();

Class Connection{
    private $server = "mysql:host=localhost;dbname=heinzkk";
    private $user = "root";
    private $pass = "";
    private $options = array (PDO::ATTR_ERRMODE =>
    PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE =>
    PDO::FETCH_OBJ);
    protected $con;

    public function openConnection(){
        try {
            $this->con = new PDO($this->server,$this->user,$this->pass,$this->options);
            return $this->con;
        } catch (PDOException $th){
            echo "There is a problem in the connection:";
            $th->getMessage();
        }
    }
    public function closeConnection(){
        $this->con = null;
    }

    public function addStudent(){
        if(isset($_POST['addstudent'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['address'];
        try {
            $connection = $this->openConnection();
            $query ="INSERT INTO tableni(`first_name`,`last_name`,`email`,`gender`,`birthdate`,`address`)
             VALUES(?,?,?,?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->execute([$first_name,$last_name,$email,$gender,$birthdate,$address]);

        } catch(PDOExeption $th){
            echo "Error:".$th->getMessage();
        }

    }
}

    public function deleteStudent(){
        if(isset($_POST['delete_student'])){

            $id = $_POST['delete_student'];
            try {
                $connection = $this->openConnection();
                $query = "DELETE FROM tableni WHERE id = :id";
                $stmt = $connection->prepare($query);
                $query_execute = $stmt->execute(["id" => $id]);
                if( $query_execute ){
                    echo '<script>alert("Deleted")</script>';
                }
            } catch (PDOException $th){
                echo "Error:".$th->getMessage();
            }
        }
    }
    public function editStudent(){
        if(isset($_POST['editStudent']))
        {
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['address'];

    try{

        $connection = $this->openConnection();
        $query = "UPDATE tableni SET first_name=:first_name,last_name=:last_name,email=:email,gender=:gender,birthdate=:birthdate,
        address = :address WHERE id=:id";

        $stmt = $connection->prepare($query);
        $data = [
        ':first_name' => $first_name, 
        ':last_name' => $last_name,
        ':email' => $email,
        ':gender' => $gender,
        ':birthdate' => $birthdate,
        ':address'=> $address,
        ':id' => $id
    ];
    $stmt->execute($data);
    } catch(PDOException $th)
    {
        echo "Error:".$th->getMessage();
    }
    }
}
}


?>