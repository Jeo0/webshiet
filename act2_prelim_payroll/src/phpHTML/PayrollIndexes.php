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
// //////////////////////////////////////////////// 
// refer to 
// function renderField(array $field)
// for the implementation of the generation of ID and NAME for javascript js and php
// //////////////////////////////////////////////// 
    $payrollindexes = array(
        "EMPLOYEE BASIC INFO",
        [
            ["cat bleh", "image"],                  // ID=__cat_bleh  NAME=cat_bleh
            ["Employee Number", "input"],           // ID=__employee_number   NAME=employee_number
            //["Search Employee", "button", "Search"],// ID=__search_employee   NAME=search_employee
            ["Department", "input disabled"]        // ID=__department        NAME=department
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
            ["Rate / Hour", "input"],                   // ID=other_income__rate_hour               NAME=other_income[rate_hour]
            ["No. of Hours / Cut Off", "input"],        // ID=other_income__no_of_hours_cut_off     NAME=other_income[no_of_hours_cut_off]
            ["Income / Cut Off", "input disabled"]
        ],
        "SUMMARY INCOME",
        [
            ["GROSS INCOME", "input"],
            ["NET INCOME", "input disabled"],
            ["Firstname", "input disabled"],
            ["Middle Name", "input disabled"],
            ["Surname", "input disabled"],
        ]
    );

    $second_form = array(
        "SUMMARY INCOME",
        [
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
        "DEDUCTION SUMMARY",
        [
            ["Total Deductions", "input disabled"]
        ]
        // BUTTONS are 
        // 
    );

?>
