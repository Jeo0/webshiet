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
    $payrollindexes = array(
        "EMPLOYEE BASIC INFO",
        [
            ["cat bleh", "image"],
            ["Employee Number", "input"],
            ["Search Employee", "button", "Search"],
            ["Department", "input disabled"]
        ],
        "BASIC INCOME",
        [
            ["Rate / Hour", "input"],
            ["No. of Hours / Cut Off", "input"],
            ["Income / Cut Off", "input disabled"]
        ],
        "HONORARIUM INCOME",
        [
            ["Rate / Hour", "input"],
            ["No. of Hours / Cut Off", "input"],
            ["Income / Cut Off", "input disabled"]
        ],
        "OTHER INCOME",
        [
            ["Rate / Hour", "input"],
            ["No. of Hours / Cut Off", "input"],
            ["Income / Cut Off", "input disabled"]
        ],
        "SUMMARY INCOME",
        [
            ["GROSS INCOME", "input"],
            ["NET INCOME", "input disabled"]
        ]
    );

    $second_form = array(
        "SUMMARY INCOME",
        [
            ["Firstname", "input disabled"],
            ["Middle Name", "input disabled"],
            ["Surname", "input disabled"],
            ["Civil Status", "input disabled"],
            ["Qualified Dependents Status", "input"],
            ["Paydate", "input"],
            ["Employee Status", "input disabled"],
            ["Designation", "input disabled"]
        ],
        "REGULAR DEDUCTIONS",
        [
            ["SSS Contribution", "input disabled"],
            ["PhilHealth Contribution", "input disabled"],
            ["Pagibig Contribution", "input disabled"],
            ["Income Tax Contribution", "input disabled"]
        ],
        "OTHER DEDUCTIONS",
        [
            ["SSS Loan", "input"],
            ["Pagibig Loan", "input"],
            ["Faculty Savings Deposit", "input"],
            ["Faculty Savings Loan", "input"],
            ["Salary Loan", "input"],
            ["Other Loans", "input"]
        ],
        "DEDUCTION SUMMARY"
    );

?>
