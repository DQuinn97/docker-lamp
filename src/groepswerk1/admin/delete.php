<?php
require("../includes/db.inc.php");
require("../includes/funcs.inc.php");


requiredAdmin();

$errors = [];
$success = false;
$id = (int)@$_GET['id'];
$game = getGameById($id);
$status = $game['status'];

if (isset($_POST['formDelete'])) {
    if ($status === 1) {
        $errors[] = "Game status needs to be set to 0 in order to be deleted.";
    }

    if (count($errors) == 0) {
        $success = deleteGame($id);
        header("Location: games.php");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delete Game - SavePoint</title>
</head>

<body>
    <div class="container">
        <main>

            <?php if (count($errors) > 0): ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>

            <div class="mt-3 mb-3 text-end">
                <a href="games.php">
                    <button type="button" class="btn btn-outline-primary">Return</button>
                </a>
            </div>
            <form method="post" action="">
                <div>
                    <h1>Are you sure you want to delete game #<?= $game['id']; ?> - <?= $game['name']; ?>?</h1>
                    <button type="submit" class="btn btn-danger" name="formDelete" style="width: 100%">Delete</button>
                </div>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>