<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset - Step 2</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h3>Enter Recovery Key</h3>
        <form id="recoveryForm" action="process_recovery_key.php" method="POST">
            <div class="form-group mb-3">
                <label for="recoveryKey">Recovery Key</label>
                <input type="text" class="form-control" id="recoveryKey" name="recoveryKey" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
        <div class="mt-3">
            <p>Didn't receive a recovery key? <a href="request_recovery_key.php">Request it via WhatsApp or Email</a>.</p>
        </div>
    </div>
</body>
</html>
