<?php
require_once "./GLOBALS.php";



function DebugPrint($msg = "DEBUG", array $what = []){
    echo "=================== <br>";
    foreach($what as $nani)
        echo $msg . " INFO: " . $nani. "<br>";
    echo "=================== <br>";
}


// =============================================================
// function to render a single field definition
// =============================================================
function RenderField(array $field) {
    [$label, $type] = $field;
    $extra = $field[2] ?? null;
    // DebugPrint("DEBUG", $field);

    // =============================================================
    // GENERATE SAFE idS AND NAMES
    // FOR JAVASCRIPT JS AND PHP
    // =============================================================
    $sectionTitle = $GLOBALS['currentSection'] ?? ''; // get section for prefix
    $prefix = preg_replace('/[^a-z0-9_]+/', '_', strtolower(trim($sectionTitle)));
    $base = preg_replace('/[^a-z0-9_]+/', '_', strtolower(trim($label)));
    $safeId = $prefix . '__' . $base;         // the DOM id
    $safeName = $prefix . '[' . $base . ']';  // the PHP-friendly name attribute
    // debug print
    // echo "safeId: " . $safeId . "<br>";
    // echo "safeName:" . $safeName;


    echo "<div class='mb-3'>";
    // Hide label only for the “cat bleh” image
    if ($type !== 'button' && $type !== 'image' && strtolower($label) !== 'cat bleh') {
        echo "<label for='$safeId' class='form-label'>$label:</label>";
    }

    // safely decide which to print
    switch ($type) {
    case 'input':
        echo "<input type='text' id='$safeId' name='$safeName' class='form-control'>";
        break;

    case 'input disabled':
        echo "<input type='text' id='$safeId' name='$safeName' class='form-control' disabled>";
        break;

    case 'button':
        $text = htmlspecialchars($extra ?? $label);
        echo "<button type='button' id='$safeId' name='$safeName' class='btn btn-danger w-100'>$text</button>";
        break;

    case 'image':
        // Default image
        $imgSrc = htmlspecialchars($extra ?? '../../assets/cat bleh.png');

        // Only show label if not “cat bleh”
        if (strtolower($label) !== 'cat bleh') {
            echo "<label class='form-label fw-semibold d-block'>$label</label>";
        }

        echo "<div class='d-flex flex-column align-items-center'>";
        echo "<img id='{$safeId}_preview' src='$imgSrc' alt='Preview' class='img-thumbnail mb-2' style='max-width:150px; max-height:150px; object-fit:cover;'>";
        // change preview with js
        echo "<input type='file' accept='image/*' id='$safeId' name='$safeName' class='form-control' onchange=\"PreviewImage(this, '{$safeId}_preview')\">";
        echo "</div>";
        break;

    default:
        echo "<!-- Unknown field type: $type -->";
    }

    echo "</div>";
}




// ============================================================= 
// function to render one entire column (left or right)
// =============================================================
function RenderFormColumn(array $formData)
{
    global $currentSection;

    for ($i = 0; $i < count($formData); $i += 2) {
        $title = $formData[$i];
        $fields = $formData[$i + 1] ?? []; // next element might not exist
        $currentSection = $title;

        echo "<div class='card m-2 bg-light border-0'><div class='m-2'>";
        echo "<h5 class='fw-bold my-2'>$title</h5>";

        // Render each field in this section
        foreach ($fields as $field) {
            RenderField($field);
        }

        echo "</div></div>"; // close card

        // special case: DEDUCTION SUMMARY (last section)
        if ($title === "DEDUCTION SUMMARY") {
            RenderDeductionButtons();
        }
    }
}




// =============================================================
// SPECIAL CASE function to render the special buttons
// OUTSIDE the “DEDUCTION SUMMARY” section
// =============================================================
function RenderDeductionButtons() {
    echo "<div class='mb-3 d-flex gap-1 flex-wrap m-2'>";
    $buttons = [
        ['GROSS INCOME', 'primary'],            // ID=__gross_income      NAME=['gross_income']
        ['NET INCOME', 'primary'],
        ['SAVE', 'info'],
        ['UPDATE', 'info'],
        ['NEW', 'warning']
    ];


    foreach ($buttons as [$label, $color]) {
        // make new 
        $base = preg_replace('/[^a-z0-9_]+/', '_', strtolower(trim($label)));
        $safeId = '__' . $base;         // the DOM id
        $safeName = '[' . $base . ']';  // the PHP-friendly name attribute

        echo "<button class='btn btn-$color flex-fill' id='$safeId' name='$safeName'>$label</button>";
    }
    echo "</div>";
}
?>

<!-- ────────────────────────────────
     JS PREVIEW FOR IMAGE UPLOADS
──────────────────────────────── -->
<script>
function PreviewImage(input, previewId) {
    const file = input.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
    document.getElementById(previewId).src = e.target.result;
    };
    reader.readAsDataURL(file);
}
</script>
