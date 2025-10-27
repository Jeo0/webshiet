document.addEventListener("DOMContentLoaded", function main() {

    //////////////////////////////////////////////////////////////////
    // cards
    const cards = document.querySelectorAll(".character_card");
    // input field
    const item_nameInput = document.getElementById("item_name");
    const priceInput = document.getElementById("price");
    const subtotal_priceInput = document.getElementById("subtotal_price");
    const quantityInput = document.getElementById("quantity");
    const disc_amountInput = document.getElementById("discount_amount");
    const discED_amountInput = document.getElementById("discounted_amount");

    const discountMap = {
        senior:     0.3,
        disc_card:  0.2,
        employee:   0.15,
        none:       0
    };
    let discountOption = discountMap["none"];
    const total_quantityInput = document.getElementById("total_quantity");
    const total_disc_givenInput = document.getElementById("total_disc_given");
    const total_discED_amountInput = document.getElementById("total_discED_amount");
    const cash_givenInput = document.getElementById("cash_given");
    const changeInput = document.getElementById("change");


    //////////////////////////////////////////////////////////////////
    // events
    function CardClick(){
        // in   card title,  card text,   
        item_nameInput.value = this.querySelector(".card_title").textContent;

        const priceText = this.querySelector(".card_text").textContent;                     // need to clean it first eg.  P123 -> 123
        priceInput.value = parseFloat(priceText.replace(/[^\d.]/g, "")).toFixed(2) || 0;    // crazy regex chatgpt cleaning

        // update price and discount amount
        CalculatePrice();
    }

    function CalculatePrice() {
        // for each ITEM CLICK      event, do this one 
        // for each QUANTITY CHANGE event, do this one 
        // for each DISCOUNT OPTION CHANGE event, do this one
        // in   quantityInput,    priceInput,         discountOption
        // out  priceInput,       disc_amountInput,   discED_amountInput

        // update subtotal_priceInput
        subtotal_priceInput.value = Number(quantityInput.value) * Number(priceInput.value);

        // update discount
        disc_amountInput.value = discountOption * Number(subtotal_priceInput.value);
        discED_amountInput.value = Number(subtotal_priceInput.value) - Number(disc_amountInput.value);
    }

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
    quantityInput.addEventListener("input", CalculatePrice);

    // card
    cards.forEach(card => {
        card.addEventListener("click", CardClick);    // also calls CalculatePrice inside
    });



    // INPUT TEXT BOX CHANGE EVENTS
    document.getElementById("quantity").addEventListener("change", CalculatePrice);


    // RADIO BUTTON EVENTS
    document.querySelectorAll('input[name="discount"]').forEach(rb => {
        rb.addEventListener("change", DiscountOptionEventButton);
    });


});

