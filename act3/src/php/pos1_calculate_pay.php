<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
  //getting data from the inputs
  $price = trim($_POST['price']) - 0;
  $quantity = trim($_POST['quantity']) - 0;
  //formulate formula to compute the amount to pay by the customer
  $amount_to_pay = $price * $quantity;
  //return results
  echo json_encode([
    'amount_to_pay' => $amount_to_pay
  ]);
}
?>
