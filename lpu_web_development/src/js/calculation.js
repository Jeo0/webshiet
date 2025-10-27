/*
document.addEventListener("DOMContentLoaded", function () {
  // Select all cards
  const cards = document.querySelectorAll(".character_card");

  // Input fields
  const itemNameInput = document.getElementById("item_name");
  const priceInput = document.getElementById("price");

  cards.forEach(card => {
    
    // when I click on a card,
    card.addEventListener("click", () => {
      // do get these shit
      const name = card.querySelector(".card_title").textContent;
      const priceText = card.querySelector(".card_text").textContent;

      // extract numeric part (remove "P") crazy regex
      const priceValue = priceText.replace(/[^\d.]/g, "");

      // update input boxes
      itemNameInput.value = name;
      priceInput.value = priceValue;
    });
  });


});
*/


document.addEventListener("DOMContentLoaded", function () {
  // SELECTORS 
  const cards = document.querySelectorAll(".character_card");

  const itemNameInput = document.getElementById("item_name");
  const priceInput = document.getElementById("price");
  const quantityInput = document.getElementById("quantity");
  const discountAmountInput = document.getElementById("discount_amount");
  const discountedAmountInput = document.getElementById("discounted_amount");

  // DISCOUNT RATES 
  const discounts = {
    senior: 0.3,
    disc_card: 0.2,
    employee: 0.15,
    no_discount: 0.00    
  };

  let selectedDiscount = 'no_discount'; // default

  // EVENT: Card Click
  cards.forEach(card => {
    card.addEventListener("click", () => {
      const name = card.querySelector(".card_title").textContent;
      const priceText = card.querySelector(".card_text").textContent;
      const priceValue = parseFloat(priceText.replace(/[^\d.]/g, "")) || 0;
      itemNameInput.value = name;
      priceInput.value = priceValue.toFixed(2);
      calculateTotal();
    });
  });

  // EVENT: Quantity Change
  quantityInput.addEventListener("input", calculateTotal);

  // EVENT: Discount Radio Buttons
  document.querySelectorAll('input[name="discount"]').forEach(radio => {
    radio.addEventListener("change", e => {
      selectedDiscount = e.target.id;
      calculateTotal();
    });
  });

  // CALCULATION FUNCTION
  function calculateTotal() {
    const price = parseFloat(priceInput.value) || 0;
    const qty = parseFloat(quantityInput.value) || 0;
    const discountRate = discounts[selectedDiscount];

    const total = price * qty;
    const discountAmt = total * discountRate;
    const discountedTotal = total - discountAmt;

    discountAmountInput.value = discountAmt.toFixed(2);
    discountedAmountInput.value = discountedTotal.toFixed(2);
  }
});
