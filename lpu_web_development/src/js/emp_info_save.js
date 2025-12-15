document.addEventListener("DOMContentLoaded", function () {
    const saveBtn = document.getElementById("savebtn");
    const uploadInput = document.getElementById("uploadfile");
    const picBox = document.getElementById("pic-box");
    const picPathInput = document.getElementById("picpath");

    // Debugging: Check if elements exist
    if (!picPathInput) console.error("ERROR: Could not find element with id='picpath'. Check your HTML.");
    if (!picBox) console.error("ERROR: Could not find element with id='pic-box'.");

    // ==========================================
    // 1. Image Upload & Preview
    // ==========================================
    if (uploadInput) {
        uploadInput.addEventListener("change", function () {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append("uploadfile", file);

            // Fetch to upload_pic.php
            fetch('process/upload_pic.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Get text first to debug PHP errors
            .then(text => {
                try {
                    const data = JSON.parse(text); // Try parsing JSON
                    if (data.ok) {
                        // Success: Update UI
                        const imgSrc = "../../" + data.temp_path; 
                        if (picBox) {
                            picBox.innerHTML = `<img src="${imgSrc}" style="width:100%; height:100%; object-fit:cover;">`;
                        }
                        
                        // Update hidden input (Safety check added)
                        if (picPathInput) {
                            picPathInput.value = data.temp_path;
                        } else {
                            alert("Upload successful, but could not save path. Missing 'picpath' input.");
                        }
                    } else {
                        alert("Server Error: " + (data.error || "Unknown error"));
                    }
                } catch (e) {
                    console.error("PHP Error Response:", text); // See the actual PHP error in Console
                    alert("Upload Failed. PHP returned an error (see Console).");
                }
            })
            .catch(error => console.error('Network Error:', error));
        });
    }

    // ==========================================
    // 2. Save Data
    // ==========================================
    if (saveBtn) {
        saveBtn.addEventListener("click", function (e) {
            e.preventDefault();

            const form = document.getElementById("employeeForm");
            const formData = new FormData(form);

            fetch('process/employee_info_save.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(text => {
                try {
                    const data = JSON.parse(text);
                    if (data.ok) {
                        alert("Data successfully added!");
                        window.location.reload(); 
                    } else {
                        alert("Error saving data: " + data.error);
                    }
                } catch (e) {
                    console.error("PHP Save Error:", text);
                    alert("Save Failed. PHP returned an error (see Console).");
                }
            })
            .catch(error => {
                console.error('Network Error:', error);
                alert("An error occurred connecting to the server.");
            });
        });
    }
});
