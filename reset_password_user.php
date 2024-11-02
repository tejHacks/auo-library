<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set New Password</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT DASHBOARD</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/school.png" type="image/png">

    <!-- Scripts -->
    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

   <style>
        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Set a New Password</h3>
        <form action="update_password.php" method="POST">
            <div class="form-group mb-3">
                <label for="newPassword">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    <span class="input-group-text toggle-password" id="togglePassword">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('newPassword');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
</body>
</html>
