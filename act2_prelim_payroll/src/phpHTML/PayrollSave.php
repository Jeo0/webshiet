<?php
include 'db_connection.php'; 

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = OpenCon();

    // collect data from POST
    // we use the ?? operator to handle empty fields safely (turning them into 0 or empty strings)
    $employee_number = $_POST['employee_number'] ?? '';
    $pay_date = $_POST['paydate'] ?? '';

    // Income Data
    $basic_rate_hour = $_POST['basic_rate_hour'] ?? 0;
    $basic_num_hrs = $_POST['basic_num_hours_cut_off'] ?? 0;
    $basic_income = $_POST['basic_income_cut_off'] ?? 0;
    
    $hono_rate_hour = $_POST['honorarium_rate_hour'] ?? 0;
    $hono_num_hrs = $_POST['honorarium_num_hours_cut_off'] ?? 0;
    $hono_income = $_POST['honorarium_income_cut_off'] ?? 0;
    
    $other_rate_hour = $_POST['other_rate_hour'] ?? 0;
    $other_num_hrs = $_POST['other_num_hours_cut_off'] ?? 0;
    $other_income = $_POST['other_income_cut_off'] ?? 0;
    
    $gross_income = $_POST['gross_income'] ?? 0;
    $net_income = $_POST['net_income'] ?? 0;

    // Deduction Data
    $sss_contri = $_POST['sss_contribution'] ?? 0;
    $philhealth_contri = $_POST['philhealth_contribution'] ?? 0;
    $pagibig_contri = $_POST['pagibig_contribution'] ?? 0;
    $income_tax_contri = $_POST['income_tax_contribution'] ?? 0;
    
    $sss_loan = $_POST['sss_loan'] ?? 0;
    $pagibig_loan = $_POST['pagibig_loan'] ?? 0;
    $fs_deposit = $_POST['faculty_savings_deposit'] ?? 0;
    $fs_loan = $_POST['faculty_savings_loan'] ?? 0;
    $salary_loan = $_POST['salary_loan'] ?? 0;
    $other_loans = $_POST['other_loans'] ?? 0;
    $total_deduction = $_POST['total_deductions'] ?? 0;

    $sql1 = "INSERT INTO incometbl (
        employee_no, income_date, 
        basic_rate_hour, basic_num_hrs, basic_income, 
        hono_rate_hour, hono_num_hrs, hono_income, 
        other_rate_hour, other_num_hrs, other_income, 
        gross_income, net_income
    ) VALUES (
        '$employee_number', '$pay_date', 
        '$basic_rate_hour', '$basic_num_hrs', '$basic_income', 
        '$hono_rate_hour', '$hono_num_hrs', '$hono_income', 
        '$other_rate_hour', '$other_num_hrs', '$other_income', 
        '$gross_income', '$net_income'
    )";

    $sql2 = "INSERT INTO deductiontbl (
        employee_no, deduction_date, 
        sss_contri, philHealth_contri, pagibig_contri, income_tax_contri, 
        sss_loan, pagibig_loan, faculty_savings_deposit, faculty_savings_loan, 
        salery_loan, other_loans, total_deduction
    ) VALUES (
        '$employee_number', '$pay_date', 
        '$sss_contri', '$philhealth_contri', '$pagibig_contri', '$income_tax_contri', 
        '$sss_loan', '$pagibig_loan', '$fs_deposit', '$fs_loan', 
        '$salary_loan', '$other_loans', '$total_deduction'
    )";

    // executing queries
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo json_encode(['status' => 'success', 
                        'message' => 'jajaja bery nice']);
    } else {
        echo json_encode(['status' => 'error', 
                        'message' => 'Error: ' . $conn->error]);
    }

    CloseCon($conn);
}
?>
