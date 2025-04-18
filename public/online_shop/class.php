<?php 
class Database {
    private $host,$db_name,$username,$password,$connection;

    public function __construct($host , $db_name ,$username ,$password){
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }
    public function connect(){
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function disconnect() {
        if ($this->connection) {
            $this->connection = null;
        }
    }
    public function getConnection() {
        return $this->connection;
    }
}
class Table {
    private $db;
    private $table_name;

    public function __construct(Database $db,$table_name)
    {
        $this->db = $db;
        $this->table_name = $table_name;
    }
    public function getAll() {
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
class User {
    private $db;
    
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    public function createUser($name, $login, $password){
        $sql = "INSERT INTO users VALUES (null, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$name, $login, $password]);
    }
    public function authUser($login,$password) {
        $sql = "SELECT * FROM users WHERE login = ? AND password = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$login,$password]);
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }
    public function logoutUser() {
        if (session_start() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

class Auto {
    public $name,$price,$year,$power;
    public function __construct($name,$price,$year,$power){

    $this->name = $name;
    $this->price = $price;
    $this->year = $year;
    $this->power = $power;
 }
    public function print() {
        echo 
        $this->name.' '.
        $this->price.' '.
        $this->year.' '.
        $this->power.
        '<br>';
    }
}

$db = new Database('MySQL-8.0','cars','root','');
$db->connect();

$userTable = new Table($db,'users');

$allUsers = $userTable->getAll();

var_dump($allUsers);

// $jeep = new Auto('Jeep Grand Cherokee','5 000 000','2024','280');
// $niva = new Auto('Niva Sport','1 700 000','2025','120');
// $jeep->print();
// $niva->print();
?>

