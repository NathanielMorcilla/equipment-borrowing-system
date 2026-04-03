<?php
include 'config.php';
// Check if login form is submitted
if (isset($_POST['login'])) {
    // Set session for admin user
    $_SESSION['user'] = "Admin";
    // Redirect to index page
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 text-center shadow-lg" style="width: 400px;">
        <h2 class="fw-bold">CCS EQUIPMENT</h2>
        <p class="text-muted small">Sign in to manage inventory</p>
        <form method="POST">
            <input type="email" class="form-control mb-3" placeholder="Email Address" required>
            <input type="password" class="form-control mb-3" placeholder="Password" required>
            <div class="form-check mb-3 text-start">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember me
                </label>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100 py-2 fw-bold">Sign In</button>
        </form>
        <p class="mt-3 text-muted small">Forgot your password? <a href="#">Contact admin</a></p>
    </div>
</body>
</html>