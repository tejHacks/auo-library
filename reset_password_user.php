<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set New Password</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Set a New Password</h3>
        <form action="process_reset_password.php" method="POST">
            <div class="form-group mb-3">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter a new password">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
