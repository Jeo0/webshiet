<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-header {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 5px;
        }
        .img-preview-box {
            width: 150px;
            height: 150px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .img-preview-box img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="bg-light py-4">

<div class="container bg-white p-4 shadow-sm rounded">
    <h2 class="mb-4">SE-RI'S EMPLOYEE PERSONAL INFORMATION</h2>

    <form id="employeeForm">
        
        <div class="row mb-3">
            <div class="col-md-2 d-flex flex-column align-items-center">
                <div class="img-preview-box" id="pic-box">
                    <span class="text-muted small">Image Preview</span>
                </div>
                <input type="file" class="form-control form-control-sm" id="uploadfile" name="uploadfile" accept="image/*">
            </div>
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="suffix" name="suffix" placeholder="e.g. Jr.">
                    </div>
                </div>
                
                <div class="row g-2 mt-2">
                    <div class="col-md-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="">-- select one --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" id="nationality" name="nationality">
                            <option value="Filipino">Filipino</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Civil Status</label>
                        <select class="form-select" id="civil_status" name="civil_status">
                            <option value="">-- select one --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md-5">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department">
            </div>
            <div class="col-md-4">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation">
            </div>
            <div class="col-md-3">
                <label class="form-label">Qualified Dep. Status</label>
                <select class="form-select" id="qualified_dependent_status" name="qualified_dependent_status">
                    <option value="">-- select one --</option>
                    <option value="Z">Z</option>
                    <option value="S">S</option>
                    <option value="S1">S1</option>
                    <option value="ME">ME</option>
                    <option value="S3 or ME3">S3 or ME3</option>
                </select>
            </div>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md-5">
                <label class="form-label">Employee Status</label>
                <input type="text" class="form-control" id="employee_status" name="employee_status">
            </div>
            <div class="col-md-3">
                <label class="form-label">Paydate</label>
                <input type="date" class="form-control" id="pay_date" name="pay_date">
            </div>
            <div class="col-md-4">
                <label class="form-label">Employee Number</label>
                <input type="text" class="form-control" id="employee_number" name="employee_number">
            </div>
        </div>

        <div class="section-header">Contact Info</div>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label">Contact No.</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email_address" name="email_address">
            </div>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label">Other (Social Media)</label>
                <select class="form-select" id="social_media" name="social_media">
                    <option value="">-- select one --</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="LinkedIn">LinkedIn</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Social Media Account ID/No.</label>
                <input type="text" class="form-control" id="social_media_account_id" name="social_media_account_id">
            </div>
        </div>

        <div class="section-header">Address</div>
        <div class="mb-2">
            <label class="form-label">Address Line 1</label>
            <input type="text" class="form-control" id="address_line1" name="address_line1">
        </div>
        <div class="mb-2">
            <label class="form-label">Address Line 2</label>
            <input type="text" class="form-control" id="address_line2" name="address_line2">
        </div>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label">City/Municipality</label>
                <input type="text" class="form-control" id="municipality" name="municipality">
            </div>
            <div class="col-md-6">
                <label class="form-label">State/Province</label>
                <input type="text" class="form-control" id="state_province" name="state_province">
            </div>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label class="form-label">Country</label>
                <select class="form-select" id="country" name="country">
                    <option value="Philippines">Philippines</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code">
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Picture Path</label>
            <input type="text" class="form-control" id="picpath" name="picpath" readonly>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-primary" id="savebtn">Save</button>
            <button type="button" class="btn btn-outline-secondary" id="cancelbtn">Cancel</button>
        </div>

    </form>
</div>

<script>
    const ROOT_LOCATION = "<?php echo '../../'; ?>"; 
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../src/js/emp_info_save.js"></script>

</body>
</html>
