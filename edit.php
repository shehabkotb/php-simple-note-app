<?php
include_once "./templates/header.php";
include_once './config/Database.php';
include_once "./middlewares/auth.php";
include_once './models/Note.php';
include_once "./models/User.php";
$user = User::get_by_id($user_id);

$database = new Database();
$db = $database->connect();

$note = new Note($db);


$note->id = isset($_GET['id']) ? $_GET['id'] : die();

$note->read_single();

if ($note->creator_id != $user_id) {
    header('Location: index.php');
    exit;
}
?>

<script src="./js/editNote.js"></script>
<link rel="stylesheet" href="./css/edit-note.css">

</head>

<body class="dx-viewport">

    <div class="page-container">

        <div class="edit-note-header">
            <h2><?= $note->title ?></h2>
            <div>
                <div id="back-btn"></div>
                <div id="save-btn"></div>
            </div>
        </div>

        <hr>

        <div class="html-editor">
            <?= $note->content ?>
        </div>
    </div>

</body>
<?php
include_once "./templates/footer.php";
