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
        <link rel="stylesheet" href="<?php echo "$g_root_location" . "src/css/button_styles.css"; ?>" >

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
                            [["Employee Number",        "input"],
                            ["Search Employee",         "button", "GADAM"],
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
                            ["NET INCOME",      "input disables"],
                            ["Firstname",       "input disabled"],
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
                        "DEDUCTION SUMMARY",
                            [["Total Deductions",       "input disabled"]]
);


// var_dump($payrollindexes);
?>


    <body>

        <div class="container py-5">

            <!-- start of -->
            <div class="row g-3">

                <!-- Order Details Column -->
                <div class="col-auto col-md-5">


<?php
$i_title_index_division = 0;
foreach($payrollindexes as $i_title){

    if ($i_title_index_division % 2 == 0) {// if even
        echo "<div class='card my-0'>";                                                                            /////// card
        echo '<h5 class="fw-bold mt-4">' . $i_title . '</h5><br>';  // EMPLOYEE BASIC INFO, BASIC INCOME, ETC
    }

    else {  // if array and odd
        // access and print the each 
        // current context is $i_title is now an array that contains 3 or n arrays: [], [], []
        for($i_label=0; $i_label<count($i_title); $i_label++){
            
            $e_current_context = $i_title[$i_label];   // array context 

                // print the label text
                echo $e_current_context[0] . ":" . "<br>";

                // establish the rules
                switch($e_current_context[1]){
                    case "input disabled":
                        echo '<input type="text" name="price" id="price" class="form-control " disabled>' . "<br>";
                        break;

                    case "input":
                        echo '<input type="text" name="price" id="price" class="form-control ">' . "<br>";
                        break;

                    case "button":
                        echo '<button class="btn btn-danger flex-fill">' 
                            . $e_current_context[2]
                            . '</button>'
                            . '<br>';
                        break;
                }
                
            }
        }
    

    $i_title_index_division++;
    if ($i_title_index_division % 2 == 0) {// if even
        echo "</div>";                                                                                  /////// card
    }
}

?>


                <!--
                    <h5 class="fw-bold mt-4">Order Details:</h5>

                    <div class="d-flex flex-column gap-2">


                        <div class="input_box  col-auto">
                            <span>Item Name:</span>
                            </div>
                            <div class="col-auto">
                            <input type="text" name="item_name" id="item_name" class="form-control form-control-sm" >
                        </div>

                        <div class="input_box col-auto">
                            <span>Price:</span>
                            </div>
                            <div class="col-auto">
                            <input type="text" name="price" id="price" class="form-control " disabled>
                        </div>

                    </div>
                -->
                </div>



                <!-- Discount Options + Calculator Column -->
                <div class="col-auto col-md-5">
                    <h5 class="fw-bold mb-3">Order Discount Options:</h5>

                    <!-- top Buttons -->
                    <div class="mb-3 d-flex gap-2 flex-wrap">
                        <button class="btn btn-primary flex-fill">CALCULATE CHANGE</button>
                        <button class="btn btn-danger flex-fill">NEW</button>
                        <button class="btn btn-warning flex-fill">SAVE</button>
                        <button class="btn btn-secondary flex-fill">UPDATE</button>
                    </div>

                </div>


            </div>
        </div>



    </body>
</html>
