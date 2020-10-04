<?php

require_once '../controller/battleController.php';

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

      <div class="row justify-content-between">
         <div class="col text-center">
            <span class="stepper-badge badge unique-color-dark">1</span>
         </div>
         <div class="col text-center">
            <span class="stepper-badge badge grey">2</span>
         </div> 
         <div class="col text-center">
            <span class="stepper-badge badge grey">3</span>
         </div>
         <div class="col text-center">
            <span class="stepper-badge badge grey">4</span>
         </div>
         <div class="col text-center">
            <span class="stepper-badge badge grey">GO</span>
         </div>
      </div>

      <div class="stepper mt-3" data-content="step-1">

         <div class="row justify-content-center">
            <!-- title -->
            <div class="col">
               <p class="h5">Qui souhaites-tu affronter ?</p>
            </div>
         </div>

         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">First</th>
                     <th scope="col">Last</th>
                     <th scope="col">Handle</th>
                     <th scope="col">Handle</th>
                     <th scope="col">Handle</th>
                     <th scope="col">Handle</th>
                     <th scope="col">Handle</th>
                     <th scope="col">Handle</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">1</th>
                     <td>Mark</td>
                     <td>Otto</td>
                     <td>@mdo</td>
                     <td>@mdo</td>
                     <td>@mdo</td>
                     <td>@mdo</td>
                     <td>@mdo</td>
                     <td>@mdo</td>
                  </tr>
               </tbody>
            </table>
         </div>

         <div class="row justify-content-end">
            <!-- buttons -->
            <button id="who" type="button" data-who class="stepper-btn btn btn-dark mr-3">Qui</button>
            <button type="button" data-on class="stepper-btn btn btn-dark mr-3">Sur</button>
            <button type="button" data-what class="stepper-btn btn btn-dark mr-3">Quoi</button>
            <button type="button" data-when class="stepper-btn btn btn-dark mr-3">Quand</button>
            <button type="button" data-submit class="stepper-btn btn btn-dark mr-3">Go!</button>
         </div>

      </div>

      <!-- permet le scroll du bas -->
      <div class="bottom-div"></div>

   </div><!-- fin container main body -->

   <div class="bottom-phone elegant-color-dark fixed-bottom">
      <?php
      include_once '../include/navbar.php'
      ?>
   </div>

   <!-- jQuery -->
   <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
   <!-- Bootstrap tooltips -->
   <script type="text/javascript" src="../assets/js/popper.min.js"></script>
   <!-- Bootstrap core JavaScript -->
   <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
   <!-- MDB core JavaScript -->
   <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
   <!-- Sweet Alert CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <!-- Your custom scripts (optional) -->
   <script>
      let betInformations = [];

      // recupération des inputs respectifs lors du click sur le bouton next
      $("button[data-who]").click(function() {
         console.log('gogo');
         betInformations[0] = 'Contre Polaire';
      });
      $("button[data-on]").click(function() {
         betInformations[1] = 'Fnatic Gagne les Worlds';
      });
      $("button[data-what]").click(function() {
         betInformations[2] = 'Un Kebab';
      });
      $("button[data-when]").click(function() {
         betInformations[3] = '2020-05-23 16:00';
      });

      // contrôle des données avant envoi sur le bouton submit
      $("button[data-submit]").click(function() {

         let addBet = true;

         // contrôles si le tableau est vide
         if (betInformations.length == 0) {
            addBet = false;
            console.log('Aucun détail');
         }
         // contrôles si le tableau ne contient pas 'undefined'
         if (betInformations.includes(undefined) || (betInformations.length < 4 && betInformations.length != 0)) {
            addBet = false;
            console.log('Attention tout n\'est pas rempli');
         }

         // envoi des données en ajax
         if (addBet) {
            $.ajax({
               url: '../controller/betAjax.php',
               type: 'GET',
               data: {
                  'bet': 'add',
                  'betName': 'Worlds League of Legends',
                  'betDescription': 'Je pari que les Fnatic gagne les worlds',
                  'betEndTtime': '1900-01-01 00:00:00',
                  'contactId': 22,
                  'betType': 1
               },
               success: function(dataReturn) {
                  if (dataReturn) {
                     Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                     );
                  }
               },
               error: function() {
                  console.log('La pari n\'a pas pu été ajouté')
               },
            });
         }
      });
   </script>
</body>

</html>