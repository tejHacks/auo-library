<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset Verification</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h3>Reset Your Password</h3>
        <form id="verificationForm" action="process_verification.php" method="POST">
            <div class="form-group mb-3">
                <label for="studentID">Student ID</label>
                <input type="text" class="form-control" id="studentID" name="studentID" placeholder="Enter your Student ID">
                <div class="invalid-feedback" id="studentIDFeedback"></div>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                <div class="invalid-feedback" id="emailFeedback"></div>
            </div>
            <div class="form-group mb-3">
                <label for="recoveryKey">Recovery Key</label>
                <input type="text" class="form-control" id="recoveryKey" name="recoveryKey" placeholder="Enter your recovery key">
                <div class="invalid-feedback" id="recoveryKeyFeedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
        <div id="errorMessage" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function () {
            function validateInput(field, value) {
                $.ajax({
                    url: 'validate_input.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { field: field, value: value },
                    success: function (response) {
                        if (response.status) {
                            $("#" + field).removeClass("is-invalid").addClass("is-valid");
                            $("#" + field + "Feedback").text(response.message).removeClass("invalid-feedback").addClass("valid-feedback");
                        } else {
                            $("#" + field).removeClass("is-valid").addClass("is-invalid");
                            $("#" + field + "Feedback").text(response.message).removeClass("valid-feedback").addClass("invalid-feedback");
                        }
                    }
                });
            }

            // Validate fields on keyup
            $("#studentID, #email, #recoveryKey").on("keyup", function () {
                validateInput(this.id, $(this).val());
            });
        });
    </script>

    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
