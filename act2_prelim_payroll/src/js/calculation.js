document.addEventListener("DOMContentLoaded", function main() {

    //////////////////////////////////////////////////////////////////
    // cards
    const cards = document.querySelectorAll(".character_card");
    // input field
    const item_nameInput = document.getElementById("item_name");



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

    function DiscountOptionEventButton() {
        const selected = document.querySelector('input[name="discount"]:checked');
        if (selected) {
            discountOption = discountMap[selected.id];  
            CalculatePrice();  // update discount and subtotal
        }
    }



    // CLICK EVENTS
    document.getElementById("calculate_change_btn").addEventListener("click", CalculateChangeEventButton);
    document.getElementById("new_btn").addEventListener("click", NewEventButton);


    // INPUT TEXT BOX CHANGE EVENTS
    document.getElementById("quantity").addEventListener("change", CalculatePrice);

});

