<?php
    $g_root_folder = "../../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale A</title>

    <!-- newer version bootstrap 5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// processing 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['calculate_bills_btn'])) {
    $price = trim($_POST['price']) - 0;
    $quantity = trim($_POST['quantity']) - 0;

    //formulate formula to compute the amount to pay by the customer
    $amount_to_pay = $price * $quantity;

    //return results
    echo json_encode([
      'amount_to_pay' => $amount_to_pay
    ]);
    // echo '<br><p class="h1">amount: ' . $amount_to_pay . '</p>';

  } 
  
  
  elseif (isset($_POST['change_btn'])) {
    $price = trim($_POST['price']) - 0;
    $quantity = trim($_POST['quantity']) - 0;
    $amount_from_customer = trim($_POST['amount_from_customer'] - 0);

    //formulate formula to compute the amount to pay by the customer
    $amount_to_pay = $price * $quantity;
    $change = $amount_from_customer - $amount_to_pay;

    //return results
    echo json_encode([
      'amount_to_pay' => $amount_to_pay,
      'change' => $change
    ]);

    // echo '<br><p class="h1">amount: ' . $amount_to_pay . '</p>';
    // echo '<br><p class="h1">change: ' . $change . '</p>';

  }


  elseif (isset($_POST['new_btn'])) {
    // handled as reload in javascript
  }
}
?>

    <!-- <script src="js/script.js"></script> -->
    <script>
        $(document).ready(function () {
            // event listener for CALCULATE BILLS button
            $('#btn_calculate_bills').click(function (e) {
                e.preventDefault();
                var price = $('#price').val();
                var quantity = $('#quantity').val();
                var data_string = 'price=' + price;
                data_string += '&quantity=' + quantity;

                $.ajax({
                    type: 'POST',
                    url: '/pos1_calculate_pay.php',
                    data: data_string,
                    dataType: 'json',
                    success: function (result) {
                        var amount_to_pay = result.amount_to_pay;
                        $('#amount_to_pay').val(amount_to_pay);
                    }
                });
            });

            // event listener for CHANGE button
            $('#btn_change').click(function (e) {
                e.preventDefault();
                var price = $('#price').val();
                var quantity = $('#quantity').val();
                var amount_to_pay = $('#amount_to_pay').val();
                var amount_from_customer = $('#amount_from_customer').val();

                var data_string = 'price=' + price;
                data_string += '&quantity=' + quantity;
                data_string += '&amount_to_pay=' + amount_to_pay;
                data_string += '&amount_from_customer=' + amount_from_customer;

                $.ajax({
                    type: 'POST',
                    url: '/pos1_change.php',
                    data: data_string,
                    dataType: 'json',
                    success: function (result) {
                        var amount_to_pay = result.amount_to_pay;
                        var change = result.change;
                        $('#amount_to_pay').val(amount_to_pay);
                        $('#change').val(change);
                    }
                });
            });
        });
    </script>

    <link rel="stylesheet" href="../css/pos1_styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="padding-top:10px; padding-bottom:10px; font-weight:bold;">
            Sample Food Ordering Application
        </h1>

<form action="pos1.php" method="post">
        <div class="pic_group">
            <div class="pic_option">
                <div>
                    <img src="<?php echo $g_root_folder . 'assets/GPUS/ARC A770.jpg' ?>" alt="Cinque Terre">
                </div>
                <input type="checkbox" id="checkbox1" name="checkbox1">
                <label for="checkbox1" id="lbl_checkbox1" value="">Barkada Meal 1</label>
            </div>

            <div class="pic_option">
                <div>
                    <img src="<?php echo $g_root_folder . 'assets/GPUS/RX 6600.jpg' ?>" alt="Cinque Terre">
                </div>
                <input type="checkbox" id="checkbox2" name="checkbox2">
                <label for="checkbox2">Family Meal A</label>
            </div>

            <div class="pic_option">
                <div>
                    <img src="<?php echo $g_root_folder . 'assets/GPUS/ARC B580.webp' ?>" alt="Cinque Terre">
                </div>
                <input type="checkbox" id="checkbox3" name="checkbox3">
                <label for="checkbox3">Chicken Value Meal 1</label>
            </div>

            <div class="pic_option">
                <div>
                    <img src="<?php echo $g_root_folder . 'assets/GPUS/GTX 1050.jpg' ?>" alt="Cinque Terre">
                </div>
                <input type="checkbox" id="checkbox4" name="checkbox4">
                <label for="checkbox4">Family Drink Pack B</label>
            </div>

            <div class="pic_option">
                <div>
                    <img src="<?php echo $g_root_folder . 'assets/GPUS/RTC 4070.jpg' ?>" alt="Cinque Terre">
                </div>
                <input type="checkbox" id="checkbox5" name="checkbox5">
                <label for="checkbox5">Barkada Meal 2</label>
            </div>

            <div style="width:100%; text-align:left;">
                <div style="width:40%; float:left;">
                    <div style="width:100%; text-align:left; padding-left:50px;">
                        <h5 class="text-left" style="padding-top:10px; font-weight:bold;">Food Order Choices:</h5>
                        <div class="bundle_option">
                            <input type="radio" name="optradio_A" id="optradio_A">
                            <label for="optradio_A">Food Bundle A</label>
                        </div>
                        <div class="bundle_option">
                            <input type="radio" name="optradio_B" id="optradio_B">
                            <label for="optradio_B">Food Bundle B</label>
                        </div>
                    </div>

                    <div style="width:100%; text-align:left; padding-left:100px;">
                        <h6 class="text-left" style="padding-top:10px; font-weight:bold;">Food Bundles A:</h6>
                        <div class="bundle_checkbox">
                            <input type="checkbox" name="deli_chicken" id="deli_chicken" value="">
                            10 pcs. Delicious Fried Chicken
                        </div>
                    </div>

                    <div style="width:100%; text-align:left; padding-left:100px;">
                        <h6 class="text-left" style="padding-top:10px; font-weight:bold;">Food Bundles B:</h6>
                        <div class="bundle_checkbox">
                            <input type="checkbox" name="halo_halo" id="halo_halo" value="">
                            4 Cups Special Halo-Halo Regular
                        </div>
                    </div>
                </div>

                <div style="width:40%; float:left;">
                    <h5 class="text-left" style="padding-top:10px; padding-left:10px; font-weight:bold;">Order Details:</h5>
                    <div style="width:100%; text-align:left; padding-left:10px; margin-bottom:50px;">
                        <div class="input_box">
                            <span>Price:</span>
                            <input type="text" name="price" id="price" value="<?php echo $quantity;?>">
                        </div>
                        <div class="input_box">
                            <span>Quantity:</span>
                            <input type="text" name="quantity" id="quantity" value="<?php echo $quantity;?>">
                        </div>
                        <div class="input_box">
                            <span>Amount To Pay:</span>
                            <input type="text" name="amount_to_pay" id="amount_to_pay" value="<?php echo $amount_to_pay;?>">
                        </div>
                        <div class="input_box">
                            <span>Cash From Customer:</span>
                            <input type="text" name="amount_from_customer" id="amount_from_customer" value="<?php echo $amount_from_customer;?>">
                        </div>
                        <div class="input_box" style="margin-bottom:10px;">
                            <span>Change:</span>
                            <input type="text" name="change" id="change" value="<?php echo $change;?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="process_button" style="margin-top:43px;">
            <button type="submit" id="btn_calculate_bills" name="calculate_bills_btn" class="btn btn-primary btn_process"
              onclick="e_calculate_bills_button()">
                CALCULATE BILLS
            </button>
            <button type="submit" id="btn_change" name="change_btn" class="btn btn-info btn_process"
              onclick="e_change_button()">
                CHANGE
            </button>
            <button type="submit" id="btn_new" name="new_btn" class="btn btn-secondary btn_process"
              onclick="e_new_button()">
                NEW
            </button>
        </div>
    </div>
</form>






</body>
</html>
