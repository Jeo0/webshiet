<!DOCTYPE html>
<!--
this shit is temporary playground to do:
  - copy paste shit
  - test bootstrap shit

update this shit once we get the homepage working
- currently working on the shittiest shit on POS of everyting

-->
<?php
$next_loc = "characters.php";
header("Location: src/phpHTML/" . "$next_loc");
exit();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Shop</title>

  </head>
  <body>


  <div class="justify-content-center text-center w-100">
      <h1 class="shope-name" style="font-family: Algerian;">Se-Ri`s Point of Sale</h1>  <!--title of the webpage-->
  </div>

  <div class="container">
    <div class="row">
      <div class="m-3 d-flex justify-content-center">
        <img class="product-imgs" src="assets/CHARACTERS/Raiden_Shogun_Card.webp" data-toggle="tooltip" data-placement="bottom" title="RAI" alt="Raiden Shogun"> 
        <img class="product-imgs" src="assets/CHARACTERS/Sucrose_Card.webp" data-toggle="tooltip" data-placement="bottom" title="SUCR" alt="Sucrose"> 
      </div>
    </div>
  </div>

    <script src="main.js"></script> <!--linking the main.js file-->

    </body>
</html>
