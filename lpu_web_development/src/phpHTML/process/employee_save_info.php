<?php
// src/phpHTML/process/employee_info_save.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../db_connection.php';
    $conn = OpenCon();

    // 1. Get POST Data [cite: 157-185]
    $employee_number = $_POST['employee_number'] ?? '';
    $fname = $_POST['fname'] ?? '';
    $mname = $_POST['mname'] ?? '';
    $lname = $_POST['lname'] ?? '';
    $suffix = $_POST['suffix'] ?? '';
    $birth_date = $_POST['birth_date'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $civil_status = $_POST['civil_status'] ?? '';
    $department = $_POST['department'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $qualified_dependent_status = $_POST['qualified_dependent_status'] ?? '';
    $employee_status = $_POST['employee_status'] ?? '';
    $pay_date = $_POST['pay_date'] ?? '';
    $contact_no = $_POST['contact_number'] ?? '';
    $email_address = $_POST['email_address'] ?? '';
    $social_media = $_POST['social_media'] ?? '';
    $social_media_account_id = $_POST['social_media_account_id'] ?? '';
    $address_line1 = $_POST['address_line1'] ?? '';
    $address_line2 = $_POST['address_line2'] ?? '';
    $municipality = $_POST['municipality'] ?? '';
    $state_province = $_POST['state_province'] ?? '';
    $country = $_POST['country'] ?? '';
    $zip_code = $_POST['zip_code'] ?? '';
    $picpath = $_POST['picpath'] ?? '';

    // 2. Move Image from Temp to Uploads [cite: 187-189]
    // Current picpath is "assets/temp/file.jpg"
    // We want to move it to "assets/uploads/file.jpg"
    $final_picpath = $picpath;
    
    // Check if it's in temp (Real path check)
    $server_root = "../../.."; // adjust to reach root from src/phpHTML/process
    $source_path = $server_root . "/" . $picpath;
    
    if (file_exists($source_path) && strpos($picpath, 'temp') !== false) {
        $filename = basename($picpath);
        $new_path_relative = "assets/uploads/" . $filename;
        $dest_path = $server_root . "/" . $new_path_relative;
        
        // Ensure uploads folder exists
        if (!file_exists(dirname($dest_path))) {
            mkdir(dirname($dest_path), 0777, true);
        }

        if (rename($source_path, $dest_path)) {
            $final_picpath = $new_path_relative;
        }
    }

    // 3. Insert into personal_infotbl [cite: 194-201]
    $sql1 = "INSERT INTO personal_infotbl (
        employee_no, fname, mname, lname, suffix, birth_date, gender, nationality,
        civil_status, department, designation, qualified_dependent_status, employee_status,
        pay_date, contact_no, email_address, other_social_media_account,
        social_media_account_id, address_line1, address_line2, municipality, state_province,
        country, zip_code, picpath
    ) VALUES (
        '$employee_number', '$fname', '$mname', '$lname', '$suffix', '$birth_date', '$gender', '$nationality',
        '$civil_status', '$department', '$designation', '$qualified_dependent_status', '$employee_status',
        '$pay_date', '$contact_no', '$email_address', '$social_media',
        '$social_media_account_id', '$address_line1', '$address_line2', '$municipality', '$state_province',
        '$country', '$zip_code', '$final_picpath'
    )";

    if ($conn->query($sql1) === TRUE) {
        
        // 4. Insert into user_accounttbl [cite: 209-210]
        // Note: The lab only inserts employee_no. Assuming other fields are handled elsewhere or allow null.
        $sql2 = "INSERT INTO user_accounttbl (employee_no) VALUES ('$employee_number')";
        
        if ($conn->query($sql2) === TRUE) {
            echo json_encode(['ok' => 1, 'picpath' => $final_picpath]);
        } else {
            echo json_encode(['ok' => 0, 'error' => 'Error in user_accounttbl: ' . $conn->error]);
        }
    } else {
        echo json_encode(['ok' => 0, 'error' => 'Error in personal_infotbl: ' . $conn->error]);
    }

    $conn->close();
}
?>
