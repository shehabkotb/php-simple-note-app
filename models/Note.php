<?php
class Note
{

  private $conn;
  private $table = 'notes';

  // note Properties
  public $id;
  public $creator_id;
  public $title;
  public $content;
  public $updated_at;
  public $creator_name;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get notes
  public function read()
  {

    $query = 'SELECT u.name as creator_name, n.id, n.creator_id, n.title, n.content, n.updated_at
                                FROM ' . $this->table . ' n
                                LEFT JOIN
                                  users u ON n.creator_id = u.id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single Note
  public function read_single()
  {
    // Create query
    $query = 'SELECT u.name as creator_name, n.id, n.creator_id, n.title, n.content, n.updated_at
                                    FROM ' . $this->table . ' n
                                    LEFT JOIN
                                      users u ON n.creator_id = u.id
                                    WHERE
                                      n.id = ?
                                    LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->creator_id = $row['creator_id'];
    $this->title = $row['title'];
    $this->content = htmlspecialchars_decode($row['content']);
    $this->updated_at = $row['updated_at'];
    $this->creator_name = $row['creator_name'];
  }

  // Create Note
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET title = :title, content = :content, creator_id = :creator_id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->content = htmlspecialchars($this->content);
    $this->creator_id = htmlspecialchars(strip_tags($this->creator_id));

    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':creator_id', $this->creator_id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Update Note
  public function update()
  {
    // Create query
    $query = 'UPDATE ' . $this->table . '
                                SET content = :content
                                WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->content = htmlspecialchars($this->content);
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Note
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
