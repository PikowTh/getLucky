<?php
session_start();

if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
} else {
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <?php include '../include/include_navbar.php' ?>
     
        <div class="title">
            <h2>Home</h2>
        </div>
    

    <script src="https://kit.fontawesome.com/2edc250389.js" crossorigin="anonymous"></script>
</body>

</html>