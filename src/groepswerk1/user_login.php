<?php

include "includes/db.inc.php";
include "includes/funcs.inc.php";

requiredLoggedOut();
$errors = [];

if (isset($_POST['login_submit'])) {
    if (!strlen($_POST['login_email'])) $errors[] = "Please enter email...";
    if (!strlen($_POST['login_password'])) $errors[] = "Please enter password...";

    $UUID = checkUser($_POST['login_email'], $_POST['login_password']);

    if ($UUID) {
        logIn($UUID);
        $_SESSION['messages'][] = ['type' => 'log', 'content' => 'logged in on ' . date("d-m-Y")];

        header("Location: index.php");
        exit;
    } else {
        $errors[] = "Wrong password...";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SavePoint is a gaming database where you can save games in personalized lists. Log in here.">
    <link rel="icon" src="images/logo70px.webp">
    <title>SavePoint - Login</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <?php include("includes/header.inc.php"); ?>
    <main>
        <section id="loginform">
            <form action="user_login.php" method="POST">
                <h3>Log in</h3>
                <ul id="error_messages"><?php foreach ($errors as $error): ?><li><?= $error ?></li><?php endforeach; ?></ul>
                <label for="login_email">Email:</label><input type="text" id="login_email" name="login_email">
                <label for="login_password">Password:</label><input type="text" id="login_password" name="login_password">
                <input type="submit" value="log in" id="login_submit" name="login_submit">
                <a href="user_register.php">Need an account? Register now!</a>
            </form>
        </section>

    </main>
    <?php include("includes/footer.inc.php"); ?>
</body>

</html>