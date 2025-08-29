<?php 
$g_root_location = "../../";
$g_asset_options = ["CHARACTERS", "CPUS", "GAMES", "GPUS", "MOTHERBOARDS"];
$g_current_asset = $g_asset_options[0];
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
      
    <!-- webpage selector -->
    <script src="
<?php 
      // echo "$g_root_location" . "src/js/selector.js";
      echo "lab1_POS/src/js/selector.js"; 
?>"></script>

  </head>

  <body class="py-5">
    <div class="container">
      <h1 class="pb-4">Backlang Iba-Iba Store</h1>
      
      <!-- image selector -->
      <div style="margin-top:30px; margin-bottom:10px">
        <button id="search_id" type="submit" name="search_btn" class="btn btn-danger" style="padding:5px; margin-bottom:5px; margin-left:40px; width:130px">SEARCH</button>
        <select id="product_option" name="product_option" style="width:250px; height:36px; padding:5px">
          <option value="pos1_page_new.php">---------------select product</option>
          <option value="<?php echo "$g_root_location" . "/src/phpHTML/" . "cpus.php"; ?>">CPUS</option>
          <option value="pos2_page_new.php">So Bango Perfumes</option>
        </select>
      </div>


      <!-- show images using grid of cards-->

<?php

    $directory = "$g_root_location" . "assets/" . "$g_current_asset" . "/";
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
      if($ii_current_arr % $intended_columns == 0) 
        echo "<div class=\"row " . "mb-5 \">";

        echo "<div class=\"col\">";
          echo "<div class=\"card character_card\">";
            // for overriding the bootstrap with css

            // card proper
            echo "<div class=\"img-wrapper\">";         // image wrapper
            echo "<img src=\"$directory$e_cards_name\" "
              . "class=\"card-img-top cardIMAGE "
              . "img-fluid mx-0 "
              . "object-fit-fill " 
              . "data-toggle=\"tooltip\" "
              . "data-placement=\"bottom\" "
              . "alt=\"$e_cards_name\" >";
            echo "</div>";                               // image wrapper
            
            // contents of the pic (below)
            echo "<div class=\"card-body\" gx-1>"; // card body

              echo "<div class=\"row\">"; // row gutter
                
                echo "<div class=\"col\ p-3\">";
                  echo "<h6 class=\"card-title\">" . $alt . "</h6>";                
                echo "</div>";

                echo "<div class=\"col\ p-3\">";
                  echo "<p class=\"card-text justify-content-end\">" . "P" . rand(10,10000) . "</p>";   // random for now, connect to database later
                echo "</div>";
                // echo "<a href=\"#\" class=\"btn btn-primary\">" . "Werelse" . "</a>";     // optional button

              echo "</div>";    // row gutter
            echo "</div>";      // card body



          echo "</div>";    // card
        echo "</div>";      // col
        $ii_current_arr++;

      if($ii_current_arr % $intended_columns == 0) echo "</div>";
    }
      

          
?>



    </div>



    <script>
      document.readyfunction(){
        '[data-toggle="tooltip"]'.tooltip();
      };
    </script>
    <script>
/*
      $("select").click(function() {
      var open = $(this).data("isopen");
      if(open) {
        window.location.href = $(this).val()
      }
      //set isopen to opposite so next time when use clicked select box
      //it wont trigger this event
      $(this).data("isopen", !open);
      });
 */

    // document.getElementById("product_option").addEventListener("change", function() {
    </script>

  </body>
</html>
