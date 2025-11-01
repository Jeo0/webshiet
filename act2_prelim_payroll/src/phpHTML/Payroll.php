<?php 
      require_once "./GLOBALS.php"; 
      require_once "./RenderFunctions.php";
      require_once "./PayrollIndexes.php";

      if (!function_exists('renderFormColumn')) {
          die("RenderFunctions.php did not load properly.");
      }

      if (!isset($payrollindexes)) {
          die("PayrollIndexes.php did not load properly.");
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sample 101</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo $g_root_location . 'src/css/image_card_styles.css'; ?>">
</head>

<body style="background-color: #f4f4f4;" class="container-flex m-5">


<div class="bg-white mismongForm shadow-sm">
    <div class="row gx-2 gy-2 justify-content-center align-items-start">
        <div class="col-auto col-md-5">
            <?php renderFormColumn($payrollindexes); ?>
        </div>

        <div class="col-auto col-md-5">
            <?php renderFormColumn($second_form); ?>
        </div>
    </div>
</div>

<script src="<?= $g_root_location . 'src/js/selector.js' ?>"></script>
<script src="<?= $g_root_location . 'src/js/calculation.js' ?>"></script>

</body>
</html>

