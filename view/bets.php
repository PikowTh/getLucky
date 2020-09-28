<?php

require_once '../controller/betsController.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veine, votre jour de chance ?</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css">

    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>


<body class="bg-veine">

    <div class="container main-body">

        <div class="bottom-div">
           <p>sdfsdsdf</p> 
           <p>sdfsdsdf</p> 
           <p>sdfsdsdf</p> 
           <input type ="button" id="who" value="WHO">
        </div>

    </div><!-- fin container main body -->


    <div class="bottom-phone elegant-color-dark fixed-bottom">
        <?php
        include_once '../include/navbar.php'
        ?>
    </div>


    <script>

        document.getElementById("who").onclick = function() {
            console.log('gogo');
        };
    </script>

</body>

</html>