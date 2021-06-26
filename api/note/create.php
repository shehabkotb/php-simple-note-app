<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Note.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// todo
// if(!auth){
//     header("HTTP/1.1 401 Unauthorized");
//     exit('Unauthorized');
// }


// Instantiate blog post object
$note = new Note($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$note->title = $data->title;
$note->content = $data->content;
$note->creator_id = $data->creator_id;

// Create note
if ($note->create()) {

  $note->id = $db->lastInsertId();
  $note->read_single();

  $note_item = array(
    'id' => $note->id,
    'title' => $note->title,
    'content' => $note->content,
    'creator_id' => $note->creator_id,
    'creator_name' => $note->creator_name,
    'updatedAt' => $note->updated_at
  );

  echo json_encode($note_item);
} else {
  echo json_encode(
    array('message' => 'note Not Created')
  );
}
