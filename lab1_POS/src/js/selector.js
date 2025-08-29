
    document.getElementById("search_id").addEventListener("click", function() {
      const select = document.getElementById("product_option");
      const url = select.value;
      if (url !== "pos1_page_new.php") {
        window.location.href = url;
      }
    });

