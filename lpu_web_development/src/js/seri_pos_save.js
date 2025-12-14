document.addEventListener("DOMContentLoaded", function () {
    const saveBtn = document.getElementById("save_btn");

    if (saveBtn) {
        saveBtn.addEventListener("click", function (ee) {
            ee.preventDefault(); // makes no more resetting / refreshing when a button is clicked

            // inputs
            const itemName = document.getElementById('item_name').value;
            const quantity = document.getElementById('quantity').value;
            const price = document.getElementById('price').value;
            const discountAmount = document.getElementById('discount_amount').value;
            const discountedAmount = document.getElementById('discounted_amount').value;
            
            const totalQuantity = document.getElementById('total_quantity').value;
            const totalDiscGiven = document.getElementById('total_disc_given').value;
            const totalDiscEDAmount = document.getElementById('total_discED_amount').value;
            
            const cashGiven = document.getElementById('cash_given').value;
            const change = document.getElementById('change').value;

            // Get selected radio button text safely
            let discountOption = "No Discount";
            const selectedRadio = document.querySelector('input[name="discount"]:checked');
            if (selectedRadio) {
                // Find the label associated with the radio button
                const label = document.querySelector(`label[for="${selectedRadio.id}"]`);
                if (label) discountOption = label.textContent;
            }

            // prepare json
            const formData = new FormData();
            formData.append('item_name', itemName);
            formData.append('quantity', quantity);
            formData.append('price', price);
            formData.append('discount_amount', discountAmount);
            formData.append('discounted_amount', discountedAmount);
            formData.append('total_quantity', totalQuantity);
            formData.append('total_disc_given', totalDiscGiven);
            formData.append('total_discED_amount', totalDiscEDAmount);
            formData.append('cash_given', cashGiven);
            formData.append('change', change);
            formData.append('discount_option', discountOption);

            // send via Fetch API (Replaces $.ajax)
            fetch('process/seri_pos_save.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    alert('Data successfully added!');
                    // reset?
                    // document.getElementById('item_name').value = ""; 
                } else {
                    alert('Error saving data: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while connecting to the server.');
            });
        });
    }
});
