<?php
  include_once (__DIR__ . "/../config/Database.php");

  class User {

    private static $conn;
    private static $table = 'users';

    // note Properties
    public $id;
    public $name;
    public $email;
    public $created_at;

    public static function set_connection($conn) {
      User::$conn = $conn;
    }

    public static function get_by_email_and_password($email, $password) {
      $query = "SELECT * FROM " . User::$table . " WHERE email = :email";
      $stmt = User::$conn->prepare($query);
      $stmt->bindParam(":email", $email);
      $stmt->execute();

      if ($stmt->rowCount() === 0) {
        return false;
      }

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!password_verify($password, $row['password'])) {
        return false;
      }

      return User::from_row($row);
    }

    public static function get_by_id($id) {
      $query = "SELECT * FROM " . User::$table . " WHERE id = :id";
      $stmt = User::$conn->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();

      if ($stmt->rowCount() === 0) {
        return false;
      }

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return User::from_row($row);
    }

    public static function create_user($name, $email, $password) {
      $query = 'INSERT INTO ' . User::$table . ' SET name = :name, email = :email, password = :password';

      // Prepare statement
      $stmt = User::$conn->prepare($query);

      // Clean data
      $name = htmlspecialchars(strip_tags($name));
      $email = htmlspecialchars(strip_tags($email));
      $password_hashed = password_hash($password, PASSWORD_DEFAULT);

      // Bind data
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password_hashed);

      // Execute query
      if(!$stmt->execute()) {
        return false;
      }

      $id = User::$conn->lastInsertId();
      return User::get_by_id($id);
    }

    public static function from_row($row) {
      $user = new User();
      $user->id = $row['id'];
      $user->name = $row['name'];
      $user->email = $row['email'];
      $user->created_at = $row['created_at'];
      return $user;
    }
    
    public function to_assoc() {
      return array(
        'id' => $this->id,
        'name' => $this->name,
        'email' => $this->email,
        'created_at' => $this->created_at,
      );
    }
  }

  $database = new Database();
  $db = $database->connect();
  User::set_connection($db);
  