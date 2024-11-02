<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h3>Password Reset - Step 1</h3>
        <form id="verifyUserForm" action="verify_user.php" method="POST">
            <div class="form-group mb-3">
                <label for="studentID">Student ID</label>
                <input type="text" class="form-control" id="studentID" name="studentID" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Registered Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
</body>
</html>
