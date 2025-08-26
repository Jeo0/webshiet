<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sample 101</title>
    <meta charset="UTF-8">


    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery library -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!-- Popper JS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
  </head>

  <body>
    <div class="container">
      <h1>My First Bootstrap Page</h1>
      <p>This is some text.</p>
      
      <!-- show images using grid -->
      <div class="row">
        <div class="col-md-3"> <img src="assets/CHARACTERS/Sucrose_Card.webp" alt="SUCROSE" data-toggle="tooltip" data-11placement="bottom" title="SUCR" alt="Sucrose" width="170" height="180" style="margin-top:30px; border:10px solid white; overflow:hidden; box-shadow: 0 0 5px; margin-bottom:30px "> </div>
        <div class="col-md-3"> <img src="assets/CHARACTERS/Yoimiya_Card.webp" alt="YOIMIYA" data-toggle="tooltip" data-11placement="bottom" title="YOIY" alt="Sucrose" width="170" height="180" style="margin-top:30px; border:10px solid white; overflow:hidden; box-shadow: 0 0 5px; margin-bottom:30px "> </div>
        <div class="col-md-3"> <img src="assets/CHARACTERS/Yelan_Card.webp" alt="YELAN" data-toggle="tooltip" data-11placement="bottom" title="YELA" alt="Sucrose" width="170" height="180" style="margin-top:30px; border:10px solid white; overflow:hidden; box-shadow: 0 0 5px; margin-bottom:30px "> </div>
      </div>

    </div>

    <script>
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

  </body>
</html>
