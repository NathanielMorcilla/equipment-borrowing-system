<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM equipment WHERE id = $id");
$row = mysqli_fetch_assoc($res);

if (isset($_POST['update'])) {
    $item_name = $_POST['item_name'];
    $category  = $_POST['category'];
    $quantity  = $_POST['quantity'];
    $status    = $_POST['status'];
    $borrower  = $_POST['borrower'];

    $sql = "UPDATE equipment SET 
            item_name='$item_name', 
            category='$category', 
            quantity='$quantity', 
            status='$status', 
            borrower='$borrower' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    }
}
include 'includes/header.php';
?>

<div class="container mt-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px; border-radius: 15px;">
        <h4 class="fw-bold mb-4 text-primary">✎ Edit Equipment</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Equipment Name</label>
                <input type="text" name="item_name" class="form-control" value="<?= $row['item_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Category</label>
                <input type="text" name="category" class="form-control" value="<?= $row['category'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="<?= $row['quantity'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="Available" <?= $row['status'] == 'Available' ? 'selected' : '' ?>>Available</option>
                    <option value="Borrowed" <?= $row['status'] == 'Borrowed' ? 'selected' : '' ?>>Borrowed</option>
                    <option value="Maintenance" <?= $row['status'] == 'Maintenance' ? 'selected' : '' ?>>Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Borrower Name</label>
                <input type="text" name="borrower" class="form-control" value="<?= $row['borrower'] ?>">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="update" class="btn btn-primary w-100 fw-bold">Update Changes</button>
                <a href="index.php" class="btn btn-light w-100 border">Cancel</a>
            </div>
        </form>
    </div>
</div>