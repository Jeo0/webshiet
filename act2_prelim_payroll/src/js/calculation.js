document.addEventListener("DOMContentLoaded", function main() {

    //////////////////////////////////////////////////////////////////
    // cards
    const cards = document.querySelectorAll(".character_card");
    // input field
    const item_nameInput = document.getElementById("item_name");

    const inputs = {};
    document.querySelectorAll("input[id]").forEach(input => {
        inputs[input.id] = input;
    });
    // how to use:
    //  inputs["employee_basic_info__employee_number"].value = "12345";

    /* ==============================================
     * ID OF INPUT FIELDS 
     * ==============================================
    // left column
    employee_basic_info__employee_number
    employee_basic_info__department

    basic_income__rate_hour
    basic_income__no_of_hours_cut_off
    basic_income__income_cut_off

    honorarium_income__rate_hour
    honorarium_income__no_of_hours_cut_off
    honorarium_income__income_cut_off

    other_income__rate_hour
    other_income__no_of_hours_cut_off
    other_income__income_cut_off

    summary_income__gross_income
    summary_income__net_income

    // right column
    summary_income__firstname
    summary_income__middle_name
    summary_income__surname
    summary_income__civil_status
    summary_income__qualified_dependents_status
    summary_income__paydate
    summary_income__employee_status
    summary_income__designation

    regular_deductions__sss_contribution
    regular_deductions__philhealth_contribution
    regular_deductions__pagibig_contribution
    regular_deductions__income_tax_contribution

    other_deductions__sss_loan
    other_deductions__pagibig_loan
    other_deductions__faculty_savings_deposit
    other_deductions__faculty_savings_loan
    other_deductions__salary_loan
    other_deductions__other_loans
    deduction_summary__total_deductions
    */
    // buttons
    const btn_gross_income = document.getElementById("__gross_income");
    const btn_net_income = document.getElementById("__net_income");
    const btn_save = document.getElementById("__save");
    const btn_update = document.getElementById("__update");
    const btn_new = document.getElementById("__new");



    //////////////////////////////////////////////////////////////////
    // events

    function CalculateChangeEventButton(){
        // in   priceInput,            disc_amountInput,        discED_amountInput,        cash_givenInput
        // out  total_quantityInput,   total_disc_givenInput,   total_discED_amountInput,  changeInput
        total_quantityInput.value       = Number(total_quantityInput.value) + Number(quantityInput.value);
        total_disc_givenInput.value     = Number(total_disc_givenInput.value) + Number(disc_amountInput.value);
        total_discED_amountInput.value  = Number(total_discED_amountInput.value) + Number(discED_amountInput.value);
        changeInput.value               = Number(cash_givenInput.value) - Number(discED_amountInput.value);
    }

    function NewEventButton(){
        // in   item_nameInput,     quantityInput,    priceInput,   subtotal_priceInput,  disc_amountInput,   discED_amountInput, cash_givenInput, changeInput
        // out  remove all in
        item_nameInput.value = "";
        quantityInput.value = "";
        subtotal_priceInput.value = "";
        priceInput.value = "";
        disc_amountInput.value = "";
        discED_amountInput.value = "";
        cash_givenInput.value = "";
        changeInput.value = "";
    }


    // ===============================================================
    // ===============================================================
    // ===============================================================
    function GrossIncomeEventButton(){
        Subroutine_IncomeCutoff();          // update income:           basic,      honorarium,     other,      summaryincome:grossincome
        Subroutine_RegularDeductions();     // update summaryincome:    sss,        philhealth,     pagibig,    income tax contirb
    }

    function NetIncomeEventButton(){
        // input:  SSS,     PAGIBIGLOAN,    FACULITYDPOSIT,     FACULITYLOAN,   SALARY LOANS,   OTHERLOANS
        // update summaryincome:    summary:NETINCOME,      deduction:TOTALDEDUCTIOn
    }
    function NewEventButton(){
        // input:   all 
    }

    // ===============================================================
    // SUBROUTINES
    // ===============================================================
    // GROSS INCOME
    function Subroutine_IncomeCutoff(){
        // in income:   basic,      honorarium,     other,      
        // out:         summaryincome:grossincome
        const e_inputVariables = [document.get]

        inputs["basic_income__income_cut_off"].value =
            Number(inputs["basic_income__rate_hour"].value) *
            Number(inputs["basic_income__no_of_hours_cut_off"].value);

        inputs["honorarium_income__income_cut_off"].value =
            Number(inputs["honorarium_income__rate_hour"].value) *
            Number(inputs["honorarium_income__no_of_hours_cut_off"].value);

        inputs["other_income__income_cut_off"].value =
            Number(inputs["other_income__rate_hour"].value) *
            Number(inputs["other_income__no_of_hours_cut_off"].value);

        // compute gross income
        inputs["summary_income__gross_income"].value =
            Number(inputs["basic_income__income_cut_off"].value) +
            Number(inputs["honorarium_income__income_cut_off"].value) +
            Number(inputs["other_income__income_cut_off"].value);
    }

    function Subroutine_RegularDeductions(){
        // in       summaryincome:grossincome
        // out:     sss,        philhealth,     pagibig,    income tax contirb
    }




    // CLICK EVENTS
    document.getElementById("__gross_income").addEventListener("click", GrossIncomeEventButton);
    document.getElementById("__net_income").addEventListener("click", NetIncomeEventButton);
    document.getElementById("__new").addEventListener("click", NewEventButton);


    // INPUT TEXT BOX CHANGE EVENTS
    document.getElementById("quantity").addEventListener("change", CalculatePrice);

});

