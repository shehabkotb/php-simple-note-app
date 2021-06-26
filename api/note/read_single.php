<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Note.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $note = new Note($db);

  // Get ID
  $note->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get note
  $note->read_single();

  // Create array
  $note_arr = array(
    'id' => $note->id,
    'title' => $note->title,
    'content' => $note->content,
    'creator_id' => $note->creator_id,
    'creator_name' => $note->creator_name,
    'updatedAt' => $note->updated_at
  );

  // Make JSON
  print_r(json_encode($note_arr));