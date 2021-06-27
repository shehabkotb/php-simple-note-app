<?php
include_once "./templates/header.php";
include_once "./middlewares/auth.php";
include_once "./models/User.php";
$user = User::get_by_id($user_id);
?>

<link rel="stylesheet" href="../css/note.css">
<script type="text/javascript" src="../js/notes.js"></script>

</head>

<body class="dx-viewport">

    <div class="notes-backdrop">
        <div class="header">
            <span class="left-center-logo"></span>
            <span class="logo"><?= "hello $user->name" ?></span>
            <span class="right-center-logo">
                <div id="add-note-btn"></div>
                <div id="logout-btn"></div>
            </span>
        </div>
        <div id="add-note-popup"></div>
        <div class="padded-notes-area">
            <div class="notes-grid">
            </div>
        </div>
    </div>
</body>
<?php
include_once "./templates/footer.php";
