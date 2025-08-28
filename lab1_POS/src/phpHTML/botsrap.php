<?php 
$g_root_location = "../../";
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
      <link rel="stylesheet" href="<?php echo "$g_root_location" . "src/css/styles.css"; ?>" >

  </head>

  <body>
    <div class="container-fluid my-5">
      <h1>Backlang Iba-Iba Store</h1>
      
      <!-- show images using grid of cards-->

<?php

    $directory = "$g_root_location" . "assets/CHARACTERS/";
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
          echo "<div class=\"card character_card\">";
            // for overriding the bootstrap with css

            // card proper
            echo "<img src=\"$directory$e_cards_name\" "
              . "class=\"card-img-top\" "
              . "data-toggle=\"tooltip\" "
              . "data-placement=\"bottom\" "
              . "alt=\"$e_cards_name\" >";
            
            // contents of the pic (below)
            echo "<div class=\"card-body\">";

              echo "<h5 class=\"card-title\">" . $alt . "</h5>";                
              echo "<p class=\"card-text\">" . "P" . rand(10,10000) . "</p>";   // random for now, connect to database later
              // echo "<a href=\"#\" class=\"btn btn-primary\">" . "Werelse" . "</a>";     // optional button
            
            echo "</div>";



          echo "</div>";    // card
        echo "</div>";      // col
        $ii_current_arr++;

      if($ii_current_arr % $intended_columns == 0) echo "</div>";
    }
      

          
?>



    </div>



    <script>
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

  </body>
</html>
