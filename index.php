<?php include_once(__DIR__ . "/middlewares/auth.php"); ?>
<?php
include_once(__DIR__ . "/models/User.php");
$user = User::get_by_id($user_id);
?>

<!DOCTYPE html>
<html lang="en">

</head>

<body>
    <?= "hello $user->name" ?>
    <a href="logout.php">Logout</a>
</body>

</html>