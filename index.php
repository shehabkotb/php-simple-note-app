<?php include_once (__DIR__ . "/middlewares/auth.php"); ?>
<?php
include_once (__DIR__ . "/models/User.php");
$user = User::get_by_id($user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?= "hello $user->name" ?>
    <a href="logout.php">Logout</a>
</body>

</html>