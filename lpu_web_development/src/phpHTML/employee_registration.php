<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-size: 0.95rem;
        }

        .section-header {
            font-weight: 600;
            font-size: 1rem;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 4px;
        }

        .img-preview-box {
            width: 120px;
            height: 120px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 0.5rem;
            font-size: 0.75rem;
        }

        .img-preview-box img {
            width: 100%;
            height: auto;
        }

        .form-label {
            margin-bottom: 0.25rem;
            font-size: 0.85rem;
        }

        .form-control,
        .form-select {
            padding: 0.35rem 0.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-light py-3">

<div class="container bg-white p-3 shadow-sm rounded">
    <h5 class="mb-3 fw-bold">PIRSONL INFO</h5>

    <form id="employeeForm">

        <div class="row mb-3">
            <div class="col-md-2 text-center">
                <div class="img-preview-box" id="pic-box">
                    <span class="text-muted">Image Preview</span>
                </div>
                <input type="file" class="form-control form-control-sm" id="uploadfile" name="uploadfile" accept="image/*">
            </div>

            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="suffix" name="suffix">
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
                            <option value="">-- select --</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" id="nationality" name="nationality">
                            <option>Filipino</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Civil Status</label>
                        <select class="form-select" id="civil_status" name="civil_status">
                            <option value="">-- select --</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
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
                <input type="text" class="form-control" id="qualified_dependent_status" name="qualified_dependent_status">
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

        <div class="mt-3">
            <button type="button" class="btn btn-primary btn-sm" id="savebtn">Save</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="cancelbtn">Cancel</button>
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
