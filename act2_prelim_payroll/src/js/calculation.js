document.addEventListener("DOMContentLoaded", function main() {

    // ===============================================================
    // cards
    // const cards = document.querySelectorAll(".character_card");
    // input field
    // const item_nameInput = document.getElementById("item_name");

    const inputs = {};
    document.querySelectorAll("input[id]").forEach(input => {
        inputs[input.id] = input;
    });

    // ===============================================================
    // ID OF INPUT FIELDS 
    // ===============================================================
    const inputIDs = [
        // left column
        "employee_basic_info__employee_number", 
        "employee_basic_info__department", 

        "basic_income__rate_hour", 
        "basic_income__no_of_hours_cut_off", 
        "basic_income__income_cut_off", 

        "honorarium_income__rate_hour", 
        "honorarium_income__no_of_hours_cut_off", 
        "honorarium_income__income_cut_off", 

        "other_income__rate_hour", 
        "other_income__no_of_hours_cut_off", 
        "other_income__income_cut_off", 

        "summary_income__gross_income", 
        "summary_income__net_income", 

        // right column
        "summary_income__firstname", 
        "summary_income__middle_name", 
        "summary_income__surname", 
        "summary_income__civil_status", 
        "summary_income__qualified_dependents_status", 
        "summary_income__paydate", 
        "summary_income__employee_status", 
        "summary_income__designation", 

        "regular_deductions__sss_contribution", 
        "regular_deductions__philhealth_contribution", 
        "regular_deductions__pagibig_contribution", 
        "regular_deductions__income_tax_contribution", 

        "other_deductions__sss_loan", 
        "other_deductions__pagibig_loan", 
        "other_deductions__faculty_savings_deposit", 
        "other_deductions__faculty_savings_loan", 
        "other_deductions__salary_loan", 
        "other_deductions__other_loans", 
        "deduction_summary__total_deductions", 
    ];
    // buttons
    const btn_gross_income = document.getElementById("__gross_income");
    const btn_net_income = document.getElementById("__net_income");
    const btn_save = document.getElementById("__save");
    const btn_update = document.getElementById("__update");
    const btn_new = document.getElementById("__new");



    // ===============================================================
    // ===============================================================
    // EVENTS
    // ===============================================================
    // ===============================================================
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
        //      &regdeductions SSS, PHILHEALTH, PAGIBIG, INCOMETAX
        // update summaryincome:    summary:NETINCOME,      deduction:TOTALDEDUCTIOn

        Subroutine_TotalDeductions();
        console.log("nice");
        Subroutine_NetIncome();

    }
    function NewEventButton(){
        // input:   all 
        // reset
        inputIDs.forEach(iii => {
            inputs[iii].value = "";
        });
    }

    // ===============================================================
    // SUBROUTINES
    // ===============================================================
    // GROSS INCOME BUTTON
    function Subroutine_IncomeCutoff(){
        // in income:   basic,      honorarium,     other,      
        // out:         summaryincome:grossincome

        inputs["basic_income__income_cut_off"].value =
            Number(inputs["basic_income__rate_hour"].value)
            *   Number(inputs["basic_income__no_of_hours_cut_off"].value);

        inputs["honorarium_income__income_cut_off"].value =
            Number(inputs["honorarium_income__rate_hour"].value)
            *   Number(inputs["honorarium_income__no_of_hours_cut_off"].value);

        inputs["other_income__income_cut_off"].value =
            Number(inputs["other_income__rate_hour"].value)
            *   Number(inputs["other_income__no_of_hours_cut_off"].value);

        // compute gross income
        inputs["summary_income__gross_income"].value =
            Number(inputs["basic_income__income_cut_off"].value)
            +   Number(inputs["honorarium_income__income_cut_off"].value)
            +   Number(inputs["other_income__income_cut_off"].value);
    }

    // GROSS INCOME BUTTON
    function Subroutine_RegularDeductions(){
        // in       summaryincome:grossincome
        // out:     sss,        philhealth,     pagibig,    income tax contirb
        inputs["regular_deductions__sss_contribution"].value = 
            Subroutine_SSSContribCalc(Number(inputs["summary_income__gross_income"].value));

        inputs["regular_deductions__philhealth_contribution"].value = 
            Subroutine_PhilhealthContribCalc(Number(inputs["summary_income__gross_income"].value));

        // 100 talaga yan fixed
        inputs["regular_deductions__pagibig_contribution"].value = 100;

        inputs["regular_deductions__income_tax_contribution"].value = 
            Subroutine_IncomeTaxContrib(Number(inputs["summary_income__gross_income"].value));

    }

    // GROSS INCOME BUTTON
    function Subroutine_SSSContribCalc(e_grossincome){
        // subroutine from Subroutine_RegularDeductions
        // REFER TO __RANGE OF COMPENSATION && ER__

        // start 1000 to 1000 + 250
        // everything else + 500

        //////////////////////////////////////////////////////////////////////////
        // determine index:
        const maxIndex = 30;
        const minRangeOfCompensation = 1000;
        const maxRangeOfCompensation = 15750;
        let r_index = 0;

        if (e_grossincome >= maxRangeOfCompensation){
            r_index = maxIndex;
        }

        // start on 1250, and special case 1000
        // if not 1000 <= e_grossincome < 1250
        else if (!(minRangeOfCompensation <= e_grossincome && e_grossincome < 1250)) {
            r_index = Math.floor((e_grossincome - 1250) / 500) + 1;
            if (r_index < 0) r_index = 0; // optional: clamp negatives
        }


        //////////////////////////////////////////////////////////////////////////
        // compute ER

        // all multiples of 3 but 0, step = 36.9
        // the rest, step = 36.8
        /* slightly off
        const step = (r_index % 3 == 0) && (r_index != 0) ? 36.9 : 36.8;
        const subtotal = 73.7 + (step * r_index);
        */
        // chatgpt helped me fix the above
        const base = 73.7;
        const stepNormal = 36.8;
        const stepLarge = 36.9;
        const cycle = 3;

        const fullCycles = Math.floor(r_index / cycle);
        const remainder = r_index % cycle;

        const subtotal = base + (fullCycles * (2 * stepNormal + stepLarge)) + (remainder * stepNormal);

        return subtotal;
    }

    // GROSS INCOME BUTTON
    function Subroutine_PhilhealthContribCalc(e_grossincome){
        // in
        // subroutine from Subroutine_RegularDeductions
        // REFER TO __SALARY SHARE && EMPLOYEE SHARE__
        const grossBase = 8000 
        const grossStep = 1000
        const empBase = 100
        const empStep = 12.5
        let index = 0;

        // gross = 9500
        // index = 
        //      (9500 - 8000)  = 1500 
        //      1500 / 1000 = 1.5 
        //      
        // DETERMINE INDEX
        index = Math.trunc((e_grossincome - grossBase) / grossStep);
        if(e_grossincome >= 35000)
            index = 27;     // max

        const subtotal = empBase + (empStep * index);
        return subtotal;
    }
    
    // GROSS INCOME BUTTON
    function Subroutine_IncomeTaxContrib(e_grossincome){
        // in: grossincome = 26000
        // out: 3083.25

        // refer to monthly
        // describes: [compensation left range, compensation right range,   prescribed withholding tax base,    percentage,     base cut off ]
        const taxTable = [
            // {RANGE_L,        RANGE_R,        DEDUCTION,                      DEDUCTION * RATE}
            { start: 0,         end: 20833,     base: 0,                        rate: 0.00 },
            { start: 20833,     end: 33332,     base: 0,                        rate: 0.20 },
            { start: 33333,     end: 66666,     base: 2500,                     rate: 0.25 },
            { start: 66667,     end: 166666,    base: 10833.33,                 rate: 0.30 },
            { start: 166667,    end: 666666,    base: 40833.33,                 rate: 0.32 },
            { start: 666667,    end: Number.MAX_SAFE_INTEGER,  base: 200833.33,  rate: 0.35 }
        ];


        function computeIncomeTax(e_salary, e_taxTable){
            let subtotal = 0;

            // determine range
            e_taxTable.forEach(iii => {

                // if within range, do process
                if (Number(iii["start"]) <= Number(e_salary)    &&  Number(e_salary) <= Number(iii["end"])){

                    subtotal = // base + rate * (e_salary - start)
                        Number(iii["base"]) + 
                        Number(iii["rate"]) * (Number(e_salary) - Number(iii["start"]));
                }
            });

            // should be 3583.25
            return subtotal;
        }

        const tax = computeIncomeTax(e_grossincome, taxTable);
        return tax;
    }


    // NET INCOME BUTTON
    function Subroutine_TotalDeductions(){
        // input all 
        const subtotal = Number(inputs["other_deductions__sss_loan"].value || 0)
            +   Number(inputs["other_deductions__pagibig_loan"].value || 0)
            +   Number(inputs["other_deductions__faculty_savings_deposit"].value || 0)
            +   Number(inputs["other_deductions__faculty_savings_loan"].value || 0)
            +   Number(inputs["other_deductions__salary_loan"].value || 0)
            +   Number(inputs["other_deductions__other_loans"].value || 0)
            +   Number(inputs["regular_deductions__sss_contribution"].value || 0)
            +   Number(inputs["regular_deductions__philhealth_contribution"].value || 0)
            +   Number(inputs["regular_deductions__pagibig_contribution"].value || 0)
            +   Number(inputs["regular_deductions__income_tax_contribution"].value || 0);

        // set
        inputs["deduction_summary__total_deductions"].value = subtotal;
    }

    // NET INCOME BUTTON
    function Subroutine_NetIncome(){
        const subtotal = 
            Number(inputs["summary_income__gross_income"].value || 0) 
            -   Number(inputs["deduction_summary__total_deductions"].value || 0);

        // set
        inputs["summary_income__net_income"].value = subtotal;
    }

    // SAVE BUTTON
    function SaveEventButton() {
        // we gather data manually to match the PHP expectations
        const formData = new FormData();

        // helper to safely get value or 0
        const val = (id) => inputs[id] ? inputs[id].value : 0;

        // basic info
        formData.append('employee_number', val("employee_basic_info__employee_number"));
        formData.append('paydate', val("summary_income__paydate"));

        // basic income
        formData.append('basic_rate_hour', val("basic_income__rate_hour"));
        formData.append('basic_num_hours_cut_off', val("basic_income__no_of_hours_cut_off"));
        formData.append('basic_income_cut_off', val("basic_income__income_cut_off"));

        // honorarium
        formData.append('honorarium_rate_hour', val("honorarium_income__rate_hour"));
        formData.append('honorarium_num_hours_cut_off', val("honorarium_income__no_of_hours_cut_off"));
        formData.append('honorarium_income_cut_off', val("honorarium_income__income_cut_off"));

        // other income
        formData.append('other_rate_hour', val("other_income__rate_hour"));
        formData.append('other_num_hours_cut_off', val("other_income__no_of_hours_cut_off"));
        formData.append('other_income_cut_off', val("other_income__income_cut_off"));

        // summary income
        formData.append('gross_income', val("summary_income__gross_income"));
        formData.append('net_income', val("summary_income__net_income"));

        // regular deductions
        formData.append('sss_contribution', val("regular_deductions__sss_contribution"));
        formData.append('philhealth_contribution', val("regular_deductions__philhealth_contribution"));
        formData.append('pagibig_contribution', val("regular_deductions__pagibig_contribution"));
        formData.append('income_tax_contribution', val("regular_deductions__income_tax_contribution"));

        // other deductions
        formData.append('sss_loan', val("other_deductions__sss_loan"));
        formData.append('pagibig_loan', val("other_deductions__pagibig_loan"));
        formData.append('faculty_savings_deposit', val("other_deductions__faculty_savings_deposit"));
        formData.append('faculty_savings_loan', val("other_deductions__faculty_savings_loan"));
        formData.append('salary_loan', val("other_deductions__salary_loan"));
        formData.append('other_loans', val("other_deductions__other_loans"));
        formData.append('total_deductions', val("deduction_summary__total_deductions"));

        // send to backend
        fetch('PayrollSave.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert("Meron na new data!");
                // optional: Clear form or redirect
                // NewEventButton(); 
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }




    // CLICK EVENTS
    document.getElementById("__gross_income").addEventListener("click", GrossIncomeEventButton);
    document.getElementById("__net_income").addEventListener("click", NetIncomeEventButton);
    document.getElementById("__new").addEventListener("click", NewEventButton);
    document.getElementById("__save").addEventListener("click", SaveEventButton);
});

