<?php 
$g_root_folder = "../../";
?>
<!DOCTYPE html>
<html lang="en"> <head> <title>Sample 101</title>
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
    <div class="container-fluid mt-1">
      <h1>Backlang Iba-Iba Store</h1>
      
      <!-- show images using grid -->


<?php
    $directory = "$g_root_folder" . "assets/CHARACTERS/";
    $filesAndDirs = array_diff(scandir($directory), array('.', '..'));
    /*
     * print_r($filesAndDirs);
    var_dump($filesAndDirs);

    for($ii = 0; $ii < 3; $ii++)
      echo "<br>";

    $iii = 0;
    foreach ($filesAndDirs as $FILES){
      echo "[$iii]: $FILES <br>";
      $iii++;
    }
     */

    $intended_columns = 4;
    $ii_current_arr = 0;

    foreach($filesAndDirs as $e_cards_name){
      $alt = pathinfo($e_cards_name, PATHINFO_FILENAME);

      // only create a new row if abot 4 columns
      if($ii_current_arr % $intended_columns == 0) echo "<div class=\"row\">";
        
        echo "<div class=\"col\">";
          echo "<img src=" . $directory . "$e_cards_name " 
            . "class=\"character_card\" "
            . "data-toggle=\"tooltip\" "
            . "data-placement=\"bottom\" "
            . "alt=\"$alt\" >";

          echo "<div>" . $alt. "</div>"; // label under image
        echo "</div>";
        $ii_current_arr++;

      if($ii_current_arr % $intended_columns == 0) echo "</div>";
    }
?>

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">

              <div class="col-md-4">
              <img src="<?php echo "$g_root_folder" . "assets/CHARACTERS/Sucrose_Card.webp"; ?>" class="img-fluid rounded-start" alt="...">
              </div>

              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
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
