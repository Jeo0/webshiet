/*
// first attemp
document.addEventListener("DOMContentLoaded", function() {
    const search_button = document.getElementById("search_id");
    const select = document.getElementById("product_option");
    const url = select.value;

    if (search_button && (url !== "pos1_page_new.php")) {
        window.location.href = url;
    }
});
*/

// chatgpt
document.addEventListener("DOMContentLoaded", function () {
  const searchBtn = document.getElementById("search_id");
  const select = document.getElementById("product_option");

  if (searchBtn && select) {
    searchBtn.addEventListener("click", function () {
      const url = select.value;
      if (url !== "pos1_page_new.php") {
        window.location.href = url;
      }
    });
  }
});

