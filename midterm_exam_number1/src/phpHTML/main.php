<?php 
$g_root_location = "../../";
$g_asset_options = ["CHARACTERS", "CPUS", "GAMES", "GPUS", "MOTHERBOARDS", "kitchen", "lights", "local bags", "perfume", "pizza"]; // size = 10
$g_current_asset = $g_asset_options[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="./yay.css">
</head>
<body>
    <?php
    function RenderCard(array $field){
        // in:  name,   price
        // out: void
        $e_name = $field;
        echo '<div class="card">';

            echo '<div class="col">';
            echo $e_name[2] . ": ";
            echo '</div>';

            echo '<div class="col">';
            echo 'Set Price: ';
            echo '<input type="text" name="' . $e_name[0] . '" value="">';

            echo 'How many quantity user want: ';
            echo '<input type="text" name="' . $e_name[1] . '" value="">';
            echo '</div>';

        echo '</div>';

    }

    function RenderDiscounts(array $field){
        [$e_id, $e_percent, $e_name] = $field;

        echo '<div class="form-check">';
            echo '<input type="radio" name="'. $e_id . '"> ';
            echo '<label>' . $e_name . '</label>';
        echo '</div>';
    }

    $g_BookNames = array(
        // nameIDPRICE : nameIDQUANITTY     : Text form to be displayed on card
        ["m1p",      "m1q", "Math 1"], 
        ["m2p",      "m2q", "Math 2"], 
        ["m3p",      "m3q", "Math 3"], 
        ["s1p",   "s1q", "Science 1"],
        ["s2p",   "s2q", "Science 2"],
        ["s3p",   "s3q", "Science 3"],
        ["Introp",     "Introq", "Introduction to Programming"],
        ["VBp",         "VBq", "VB. Net"],
        ["Javap",       "Javaq","Java"],
        ["PHPp",        "PHPq", "PHP for Web Programming"],
        ["Philop",     "Philoq","Philosophy"],
        ["Biop",       "Bioq", "Biology 2"],
        ["Dailyp",     "Dailyq", "Daily Bread Book for Life"]
    );

    $g_DiscountOptions = array(
        // ID,  disc%,  Text form to be displayed on radio button
        ["Senior",  0.25, "Senior citizen"],
        ["PWD",  0.15, "PWD"],
        ["Members",  0.1, "With Membership"],
        ["No",  0,  "No Discount"],
    );
    


    // printing proper BOOKS
    echo '<form action="main.php" method="post">';
    foreach($g_BookNames as $nani){
        RenderCard($nani);
    }

    // printing proper DISCOUTNS
    foreach($g_DiscountOptions as $nani){
        RenderDiscounts($nani);
    }

    // printing proper BUTTON
    echo '<button type="submit" name="calculate_bills_btn">';
        echo 'CALCULATE BILLS';
    echo '</button>';
    
    echo '</form>';

    echo '<h1> the total would be: </h1>';
    echo '<p name="FINAL_PRICE" value="$total"></p>';
    ?>


    <?php
    // PROCESSING
    // getting inputs
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(isset($_POST["calculate_bills_btn"])){

            $total = 0;

            // set discount
            $discount = 0;     
            if ($_POST["Senior"]){
                $discount = $g_DiscountOptions[0][1];
            } elseif($_POST["PWD"]) {
                $discount = $g_DiscountOptions[1][1];
            } elseif($_POST["Members"]) {
                $discount = $g_DiscountOptions[2][1];
            } elseif($_POST["No"]) {
                $discount = $g_DiscountOptions[3][1];
            }

            // set total 
            foreach($g_BookNames as [$pp, $qq, $name]){
                if($_POST["$qq"] == "" || $_POST["$qq"] == 0){
                    $pp = 0;
                }

                // accumulate 
                $total += (int)$pp;
            }

            // calculate
            $total = (.1 - $discount)  * $total;
            
            $_POST["FINAL_PRICE"] = $total;

        }
    }

    ?>

</body>
</html>