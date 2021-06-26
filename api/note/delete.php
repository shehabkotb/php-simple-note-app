<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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

  // Instantiate note object
  $note = new Note($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $note->id = $data->id;

  // Delete note
  if($note->delete()) {
    echo json_encode(
      array('message' => 'note Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'note Not Deleted')
    );
  }