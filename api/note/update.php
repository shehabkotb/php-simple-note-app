<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Note.php';
include_once "../../middlewares/api-auth.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate note object
$note = new Note($db);

// Get raw noteed data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$note->id = $data->id;

$note->content = $data->content;

// Update note
if ($note->update()) {
  echo json_encode(
    array('message' => 'note Updated')
  );
} else {
  echo json_encode(
    array('message' => 'note Not Updated')
  );
}
