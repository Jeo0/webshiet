<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sample 101</title>
    <meta charset="UTF-8">


    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">--> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    -->


    <!-- jQuery library -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!-- Popper JS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    
    <!-- newer version bootstrap 5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- custom styles (relative path) -->
    <link rel="stylesheet" href="../css/styles.css">

  </head>

  <body>
    <div class="container">
      <h1>Backlang Sari Store</h1>
      <p>helyea</p>
      
      <!-- show images using grid -->

    
      <div class="row">
        <div class="col"> <img src="../../assets/CHARACTERS/Sucrose_Card.webp" 
                              alt="SUCROSE" 
                              title="SUCR" 
                              class="character_card"

                              data-toggle="tooltip" 
                              data-placement="bottom" 
                              >
                            </div>
      </div>
    


    </div>

    <script>
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

  </body>
</html>
