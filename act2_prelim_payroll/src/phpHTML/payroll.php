<!DOCTYPE html>
<html lang="en"> <head> <title>Sample 101</title>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- newer version bootstrap 5.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- custom styles (relative path) -->
        <link rel="stylesheet" href="<?php echo "$g_root_location" . "src/css/image_card_styles.css"; ?>" >

        <!-- webpage selector -->
        <script src="
            <?php 
            echo "$g_root_location" . "src/js/selector.js";
            ?>">
        </script>
    </head>

<?php
// 0 EMPLOYEE 
// 1 ARRAY {
//    [1][0][0]   employeenumber
//    [1][0][1]   input
//    [1][1][0]   search employee
//    [1][1][1]   button
//    ...
// 2 BASIC INCOME 
// 3 ARRAY {
//    [3][0][0]   rate hout
//    [3][0][1]   input
//    [3][1][0]   search employee
//    [3][1][1]   button 
//    [3][1][2]   button text
//    ...
$payrollindexes = array( "EMPLOYEE BASIC INFO",  
                            [["cat bleh",               "image"],
                            ["Employee Number",         "input"],
                            ["Search Employee",         "button", "Search"],
                            ["Department",              "input disabled"]],
                        "BASIC INCOME",
                            [["Rate / Hour",            "input"],
                            ["No. of Hours / Cut Off",  "input"],
                            ["Income / Cut Off",        "input disabled"]],
                        "HONORARIUM INCOME",
                            [["Rate / Hour",            "input"],
                            ["No. of Hours / Cut Off",  "input"],
                            ["Income / Cut Off",        "input disabled"]],
                        "OTHER INCOME",
                            [["Rate / Hour",            "input"],
                            ["No. of Hours / Cut Off",  "input"],
                            ["Income / Cut Off",        "input disabled"]],
                        "SUMMARY INCOME",
                            [["GROSS INCOME",   "input"],
                            ["NET INCOME",      "input disabled"]]
);

$second_form = array(
                        "SUMMARY INCOME",
                            [["Firstname",       "input disabled"],
                            ["Middle Name",     "input disabled"],
                            ["Surname",         "input disabled"],
                            ["Civil Status",    "input disabled"],
                            ["Qualified Dependents Status",       "input"],
                            ["Paydate",                           "input"],
                            ["Employee Status",   "input disabled"],
                            ["Designation",       "input disabled"]],
                        "REGULAR DEDUCTIONS",
                            [["SSS Contribution",             "input disabled"],
                            ["PhilHealth Contribution",       "input disabled"],
                            ["Pagibig Contribution",          "input disabled"],
                            ["Income Tax Contribution",       "input disabled"]],
                        "OTHER DEDUCTIONS",
                            [["SSS Loan",               "input"],
                            ["Pagibig Loan",            "input"],
                            ["Faculty Savings Deposit", "input"],
                            ["Faculty Savings Loan",    "input"],
                            ["Salary Loan",             "input"],
                            ["Other Loans",             "input"]],
                        "DEDUCTION SUMMARY"
);


// var_dump($payrollindexes);
?>


    <body style="background-color: #f4f4f4;" class="container-flex m-2 ">

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
foreach($payrollindexes as $i_title){

    if ($i_title_index_division % 2 == 0) {// if even
        echo "<div class='card m-2 bg-light border-0'>";                                                                            /////// card
        echo "<div class='m-2'>";                                                                                  /////// padding on the left

        echo '<h5 class="fw-bold mt-2">' . $i_title . '</h5>';  // EMPLOYEE BASIC INFO, BASIC INCOME, ETC
    }

    else {  // if array and odd
        // access and print the each 
        // current context is $i_title is now an array that contains 3 or n arrays: [], [], []

        for($i_label=0; $i_label<count($i_title); $i_label++){
            
            $e_current_context = $i_title[$i_label];   // array context 



                // print the label text
                // SEARCH EMPLOYEE
                if($e_current_context[0] != "cat bleh")
                  echo $e_current_context[0] . ":";
                
                


                // establish the rules
                // INPUTS
                switch($e_current_context[1]){
                    case "input disabled":
                        echo '<input type="text" name="price" id="price" class="form-control " disabled>';
                        break;

                    case "input":
                        echo '<input type="text" name="price" id="price" class="form-control ">';
                        break;

                    case "button":
                        echo '<button type="button" class="btn btn-danger flex-fill d-block">' 
                            . $e_current_context[2]
                            . '</button>';
                        break;
                    case "image":
                        echo '<img src="../../assets/cat bleh.png" '
                          . 'class="img d-block" ';
                }
                
            }
        }
    

    $i_title_index_division++;
    if ($i_title_index_division % 2 == 0) {// if even
        echo "</div>";                                                                                  /////// padding left
        echo "</div>";                                                                                  /////// card
    }
}

echo '</div>'; // end of column











echo '<div class="col-auto col-md-5">'; // another column

///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
// second column
$i_title_index_division = 0;
foreach($second_form as $i_title){

    if ($i_title_index_division % 2 == 0) {// if even
        echo "<div class='card m-2 bg-light border-0'>";                                                                            /////// card
        echo "<div class='m-2'>";                                                                                  /////// padding on the left

        echo '<h5 class="fw-bold my-2">' . $i_title . '</h5>';  // EMPLOYEE BASIC INFO, BASIC INCOME, ETC


        // <!--FINAL COLUMN -->
        // hardcoded
        if($i_title == "DEDUCTION SUMMARY"){
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

    }

    else {  

      // if array and odd
        // access and print the each 
        // current context is $i_title is now an array that contains 3 or n arrays: [], [], []
        for($i_label=0; $i_label<count($i_title); $i_label++){
            
            $e_current_context = $i_title[$i_label];   // array context 



                // print the label text
                // SEARCH EMPLOYEE
                if($e_current_context[0] != "cat bleh")
                  echo $e_current_context[0] . ":";

                


                // establish the rules
                // INPUTS
                switch($e_current_context[1]){
                    case "input disabled":
                        echo '<input type="text" name="price" id="price" class="form-control " disabled>';
                        break;

                    case "input":
                        echo '<input type="text" name="price" id="price" class="form-control ">';
                        break;

                    case "button":
                        echo '<button type="button" class="btn btn-danger flex-fill d-block">' 
                            . $e_current_context[2]
                            . '</button>';
                        break;
                    case "image":
                        echo '<img src="../../assets/cat bleh.png" '
                          . 'class="img d-block" ';
                }
                
            }
        }
    

    $i_title_index_division++;
    if ($i_title_index_division % 2 == 0) {// if even
        echo "</div>";                                                                                  /////// padding left
        echo "</div>";                                                                                  /////// card
    }
}



?>
                </div>





            </div>    
        
        </div>



    </body>
</html>
