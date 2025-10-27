<?php include "./GLOBALS.php"?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sample 101</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- newer version bootstrap 5.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- custom styles (relative path) -->
        <link rel="stylesheet" href="<?php echo '$g_root_location' . 'src/css/image_card_styles.css'; ?>">

    </head>

    <!---------------- VARIABLES -------------------->
    <?php include "./PayrollIndexes.php"; ?>


    <!---------------- RENDER PROPER -------------------->
    <body style="background-color: #f4f4f4;" class="container-flex m-2">
<!-- mismong form -->
        <div class="container-flex m-5 bg-white mismongForm" style="box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);">

            <!-- start of -->
            <div class="row gx-0 justify-content-center">
                <?php
                // Order Details 1 Column 
                echo '<div class="col-auto col-md-5">';

                ///////////////////////////////////////////
                ///////////////////////////////////////////
                ///////////////////////////////////////////
                ///////////////////////////////////////////
                // first column

                $i_title_index_division = 0;
                foreach ($payrollindexes as $i_title) {
                    if ($i_title_index_division % 2 == 0) { // if even
                        echo "<div class='card m-2 bg-light border-0'>";
                        /////// card
                        echo "<div class='m-2'>";
                        /////// padding on the left
                        echo '<h5 class="fw-bold mt-2">' . $i_title . '</h5>';  // EMPLOYEE BASIC INFO, BASIC INCOME, ETC
                    } else {  // if array and odd
                        // access and print each
                        for ($i_label = 0; $i_label < count($i_title); $i_label++) {
                            $e_current_context = $i_title[$i_label];   // array context 

                            // print the label text
                            if ($e_current_context[0] != "cat bleh")
                                echo $e_current_context[0] . ":";

                            // establish the rules
                            switch ($e_current_context[1]) {
                                case "input disabled":
                                    echo '<input type="text" name="price" id="price" class="form-control " disabled>';
                                    break;
                                case "input":
                                    echo '<input type="text" name="price" id="price" class="form-control ">';
                                    break;
                                case "button":
                                    echo '<button type="button" class="btn btn-danger flex-fill d-block">' .
                                        $e_current_context[2] .
                                        '</button>';
                                    break;
                                case "image":
                                    echo '<img src="../../assets/cat bleh.png" class="img d-block">';
                            }
                        }
                    }

                    $i_title_index_division++;
                    if ($i_title_index_division % 2 == 0) { // if even
                        echo "</div>"; /////// padding left
                        echo "</div>"; /////// card
                    }
                }

                echo '</div>'; // end of column


                ///////////////////////////////////////////////////
                // another column
                echo '<div class="col-auto col-md-5">'; 

                ///////////////////////////////////////////////////
                ///////////////////////////////////////////////////
                ///////////////////////////////////////////////////
                ///////////////////////////////////////////////////
                // second column
                $i_title_index_division = 0;
                foreach ($second_form as $i_title) {
                    if ($i_title_index_division % 2 == 0) { // if even
                        echo "<div class='card m-2 bg-light border-0'>";
                        /////// card
                        echo "<div class='m-2'>";
                        /////// padding on the left
                        echo '<h5 class="fw-bold my-2">' . $i_title . '</h5>';  // EMPLOYEE BASIC INFO, BASIC INCOME, ETC

                        // <!--FINAL COLUMN -->
                        // hardcoded
                        if ($i_title == "DEDUCTION SUMMARY") {
                            echo 'Total Deductions:';
                            echo '<input type="text" name="price" id="price" class="form-control mb-3" disabled>';

                            // <!-- top Buttons -->
                            echo '<div class="mb-3 d-flex gap-1 flex-wrap">';
                            echo '<button class="btn btn-primary flex-fill">GROSS INCOME</button>';
                            echo '<button class="btn btn-primary flex-fill">NET INCOME</button>';
                            echo '<button class="btn btn-info flex-fill">SAVE</button>';
                            echo '<button class="btn btn-info flex-fill">UPDATE</button>';
                            echo '<button class="btn btn-warning flex-fill">NEW</button>';
                            echo '</div>';
                        }
                    } else {
                        // if array and odd
                        for ($i_label = 0; $i_label < count($i_title); $i_label++) {
                            $e_current_context = $i_title[$i_label];   // array context 

                            // print the label text
                            if ($e_current_context[0] != "cat bleh")
                                echo $e_current_context[0] . ":";

                            // establish the rules
                            switch ($e_current_context[1]) {
                                case "input disabled":
                                    echo '<input type="text" name="price" id="price" class="form-control " disabled>';
                                    break;
                                case "input":
                                    echo '<input type="text" name="price" id="price" class="form-control ">';
                                    break;
                                case "button":
                                    echo '<button type="button" class="btn btn-danger flex-fill d-block">' .
                                        $e_current_context[2] .
                                        '</button>';
                                    break;
                                case "image":
                                    echo '<img src="../../assets/cat bleh.png" class="img d-block">';
                            }
                        }
                    }

                    $i_title_index_division++;
                    if ($i_title_index_division % 2 == 0) { // if even
                        echo "</div>"; /////// padding left
                        echo "</div>"; /////// card
                    }
                }
                ?>
                </div>
            </div>   <!-- start --> 


        </div>  <!-- mismong form -->


        <!-- webpage selector -->
        <script src="<?php echo "$g_root_location" . "src/js/selector.js"; ?>"></script>
        <script src="<?php echo "$g_root_location" . "src/js/calculation.js"; ?>"></script>

    </body>
</html>
