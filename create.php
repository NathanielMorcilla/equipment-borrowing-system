<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $category  = $_POST['category'];
    $quantity  = $_POST['quantity'];
    $status    = $_POST['status'];
    $borrower  = $_POST['borrower'];

    $sql = "INSERT INTO equipment (item_name, category, quantity, status, borrower) 
            VALUES ('$item_name', '$category', '$quantity', '$status', '$borrower')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
include 'includes/header.php';
?>

<div class="container mt-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px; border-radius: 15px;">
        <h4 class="fw-bold mb-4 text-primary">➕ Add New Equipment</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Equipment Name</label>
                <input type="text" name="item_name" class="form-control" placeholder="e.g. Laptop Dell" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Category</label>
                <input type="text" name="category" class="form-control" placeholder="e.g. Computer" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="Available">Available</option>
                    <option value="Borrowed">Borrowed</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Borrower Name (Optional)</label>
                <input type="text" name="borrower" class="form-control" placeholder="e.g. John Doe or -">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-primary w-100 fw-bold">Save Equipment</button>
                <a href="index.php" class="btn btn-light w-100 border">Cancel</a>
            </div>
        </form>
    </div>
</div>