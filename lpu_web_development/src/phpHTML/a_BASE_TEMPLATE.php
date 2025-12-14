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

        <!-- newer version bootstrap 5.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- custom styles (relative path) -->
        <link rel="stylesheet" href="<?php echo "$g_root_location" . "src/css/image_card_styles.css"; ?>">
        <link rel="stylesheet" href="<?php echo "$g_root_location" . "src/css/button_styles.css"; ?>">

    </head>

    <body class="py-5">
        <div class="container">
            <h1 class="pb-4">Backlang Iba-Iba Store</h1>

            <!-- image selector -->
            <div style="margin-top:30px; margin-bottom:10px">
                <button id="search_id" type="submit" name="search_btn" class="btn btn-danger">SEARCH</button>
                <select id="product_option" name="product_option">
                    <option value="pos1_page_new.php">---------------select product</option>
                    <?php
                    // create option for each folders included in the array 
                    foreach ($g_asset_options as $e_local_option) {
                        echo "<option value=\"$g_root_location" . "src/phpHTML/" . strtolower($e_local_option) . ".php\">" . "$e_local_option" . "</option>";
                    }
                    ?>
                    <!--
                    <option value="<?php // echo "$g_root_location" . "src/phpHTML/" . "cpus.php"; ?>">CPUS</option>
                    <option value="<?php // echo "$g_root_location" . "src/phpHTML/" . ".php"; ?>">CHARACTERS</option>
                    -->
                </select>
            </div>

            <!-- ===========================  show images using grid of cards =================================== -->
            <?php

            $directory = "$g_root_location" . "assets/" . "$g_current_asset" . "/";
            $filesAndDirs = array_diff(scandir($directory), array('.', '..'));

            $intended_columns = 5;
            $ii_current_arr = 0;

            $prices_database = []; // to generate the random PESOS for each cards 

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // THE row of cards with images
            foreach ($filesAndDirs as $e_cards_name) {
                $alt = pathinfo($e_cards_name, PATHINFO_FILENAME);

                // only create a new row if abot 4 columns
                if ($ii_current_arr % $intended_columns == 0)
                    echo "<div class=\"row mb-5\">";

                echo "<div class=\"col\">";
                echo "<div class=\"card character_card\">";
                // for overriding the bootstrap with css

                // card proper
                echo "<div class=\"img_wrapper\">";
                echo "<img src=\"$directory$e_cards_name\" "
                    . "class=\"card-img-top card_image "
                    . "img-fluid mx-0 "
                    . "data-bs-toggle=\"tooltip\" "
                    . "data-bs-placement=\"bottom\" "
                    . "title=\"$alt\" "
                    . "alt=\"$e_cards_name\">";
                echo "</div>";

                // contents of the pic (below)
                echo "<div class=\"card-body\" gx-1>";
                echo "<div class=\"row\">";
                echo "<div class=\"col p-3\">";
                echo "<h6 class=\"card_title\">" . $alt . "</h6>";
                echo "</div>";

                echo "<div class=\"col p-3\">";
                
                array_push($prices_database, rand(10, 10000));  // store the prices
                echo "<p class=\"card_text justify-content-end\">P" . $prices_database[$ii_current_arr] . "</p>";
                echo "</div>";

                echo "</div>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                $ii_current_arr++;

                if ($ii_current_arr % $intended_columns == 0)
                    echo "</div>";
            }
            ?>
        </div>

        <div class="container pt-0 pb-5">
            <div class="row g-4">
                <!-- Order Details Column -->
                <div class="col-md-5">
                    <h5 class="fw-bold mb-3">Order Details:</h5>
                    <div class="d-flex flex-column gap-2">
                        <form method="post" action="a_BASE_TEMPLATE.php"> <!-------------------------------------------------------------------- form -->
                        <div class="input_box">
                            <span>Item Name:</span>
                                            <!-- name = php     id = js -->
                            <input type="text" name="item_name" id="item_name" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Price:</span>
                            <input type="text" name="price" id="price" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Subtotal Price:</span>
                            <input type="text" name="subtotal_price" id="subtotal_price" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Quantity:</span>
                            <input type="text" name="quantity" id="quantity" class="form-control form-control-sm" 
                                value="">
                        </div>
                        <div class="input_box">
                            <span>Discount Amount:</span>
                            <input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Discounted Amount:</span>
                            <input type="text" name="discounted_amount" id="discounted_amount" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="input_box">
                            <span>Total Quantity:</span>
                            <input type="text" name="total_quantity" id="total_quantity" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Total Discount Given:</span>
                            <input type="text" name="total_disc_given" id="total_disc_given" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Total Discounted Amount:</span>
                            <input type="text" name="total_discED_amount" id="total_discED_amount" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        <div class="input_box">
                            <span>Cash Given:</span>
                            <input type="text" name="cash_given" id="cash_given" class="form-control form-control-sm"
                                value="">
                        </div>
                        <div class="input_box">
                            <span>Change:</span>
                            <input type="text" name="change" id="change" class="form-control form-control-sm" 
                                value="" disabled>
                        </div>
                        </form> <!------------------------------------------------------------------------------------------------------- form -->
                    </div>
                </div>

                <!-- Discount Options + Calculator Column -->
                <div class="col-md-7">
                    <h5 class="fw-bold mb-3">Order Discount Options:</h5>

                    <!-- radio Buttons -->
                    <div class="mb-3 d-flex gap-3 flex-wrap">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="senior">
                            <label class="form-check-label" for="senior">Senior Citizen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="disc_card">
                            <label class="form-check-label" for="disc_card">With Disc. Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="employee">
                            <label class="form-check-label" for="employee">Employee Disc.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="none">
                            <label class="form-check-label" for="none">No Discount</label>
                        </div>
                    </div>

                    <!-- top buttons -->
                    <div class="mb-3 d-flex gap-2 flex-wrap">
                        <button class="btn btn-primary flex-fill" name="calculate_change_btn" id="calculate_change_btn">CALCULATE CHANGE</button>
                        <button class="btn btn-danger flex-fill" name="new" id="new_btn">NEW</button>
                        <button class="btn btn-warning flex-fill" name="save" id="save_btn">SAVE</button>
                        <button class="btn btn-secondary flex-fill" name="update" id="update_btn">UPDATE</button>
                    </div>

                    <!-- calculator -->
                    <div class="d-grid gap-2" style="grid-template-columns: 2fr repeat(3, 1fr); max-width: 500px;">
                        <button class="btn btn-primary" style="grid-row: 1 / 6;">ENTER</button>
                        <button class="btn btn-dark">/</button>
                        <button class="btn btn-dark">*</button>
                        <button class="btn btn-dark">-</button>
                        <button class="btn btn-dark">+</button>
                        <button class="btn btn-dark">6</button>
                        <button class="btn btn-dark">7</button>
                        <button class="btn btn-dark">8</button>
                        <button class="btn btn-dark">9</button>
                        <button class="btn btn-dark">2</button>
                        <button class="btn btn-dark">3</button>
                        <button class="btn btn-dark">4</button>
                        <button class="btn btn-dark">5</button>
                        <button class="btn btn-dark">0</button>
                        <button class="btn btn-dark">.</button>
                        <button class="btn btn-dark">1</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- webpage selector -->
        <script src="<?php echo "$g_root_location" . "src/js/selector.js"; ?>"></script>

        <!--<script src="<?php // echo "$g_root_location" . "src/js/" . "calculation.js"; ?>"></script>-->
        <script src="<?php echo "$g_root_location" . "src/js/" . "calculation2.js"; ?>"></script>

        <!-- for database -->
        <script src="<?php echo "$g_root_location" . "src/js/" . "seri_pos_save.js"; ?>"></script>
    </body>
</html>

