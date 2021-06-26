<?php
include_once "./templates/header.php";
include_once './config/Database.php';
include_once './models/Note.php';

$database = new Database();
$db = $database->connect();

$note = new Note($db);


$note->id = isset($_GET['id']) ? $_GET['id'] : die();

//todo check if creator of note

$note->read_single();

?>

<script src="./js/editNote.js"></script>
<link rel="stylesheet" href="./styles/edit-note.css">

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
