<?php
// not to be used
// instead use the pos1.php
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

  }


  elseif (isset($_POST['new_btn'])) {
    // handled as reload in javascript
  }
}
?>

