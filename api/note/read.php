<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Note.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate note object
$notes = new Note($db);

// Blog notes query
$result = $notes->read();
// Get row count
$num = $result->rowCount();


//todo get notes for authenticated user only

// Check if any notess
if ($num > 0) {
  // notes array
  $notes_arr = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $notes_item = array(
      'id' => $id,
      'title' => $title,
      'content' => htmlspecialchars_decode($content),
      'creator_id' => $creator_id,
      'creator_name' => $creator_name,
      'updated_at' => $updated_at
    );

    // Push to "data"
    array_push($notes_arr, $notes_item);
  }

  // Turn to JSON & output
  echo json_encode($notes_arr);
} else {
  // No notess
  echo json_encode(
    array()
  );
}
