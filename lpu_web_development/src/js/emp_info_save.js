document.addEventListener("DOMContentLoaded", function () {
    const saveBtn = document.getElementById("savebtn");
    const uploadInput = document.getElementById("uploadfile");
    const picBox = document.getElementById("pic-box");
    const picPathInput = document.getElementById("picpath");

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
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    // Update preview box
                    // Note: ROOT_LOCATION is defined in the PHP file script tag
                    // We assume relative pathing works if running on localhost
                    const imgSrc = "../../" + data.temp_path; 
                    picBox.innerHTML = `<img src="${imgSrc}" style="width:100%; height:100%; object-fit:cover;">`;
                    
                    // Update hidden input
                    picPathInput.value = data.temp_path;
                } else {
                    alert("Error uploading picture: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error:', error));
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

            // We use FormData directly, but the PHP expects specific keys. 
            // Since our HTML name attributes match the PHP keys, FormData works automatically.

            fetch('process/employee_info_save.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    alert("Data successfully added!");
                    window.location.reload(); // Refresh page to clear form
                } else {
                    alert("Error saving data: " + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred connecting to the server.");
            });
        });
    }
});
