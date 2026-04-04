<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $available = $_POST['available'];
    $condition = $_POST['condition'];

    $sql = "INSERT INTO equipment (name, description, category, quantity, available, `condition`) 
            VALUES ('$name', '$description', '$category', '$quantity', '$available', '$condition')";

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
                <input type="text" name="name" class="form-control" placeholder="e.g. Laptop Dell" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Brief description of the equipment"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Category</label>
                <input type="text" name="category" class="form-control" placeholder="e.g. Computer" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Quantity</label>
                <input type="number" name="quantity" class="form-control" value="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Available Quantity</label>
                <input type="number" name="available" class="form-control" value="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Condition</label>
                <select name="condition" class="form-select">
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-primary w-100 fw-bold">Save Equipment</button>
                <a href="index.php" class="btn btn-light w-100 border">Cancel</a>
            </div>
        </form>
    </div>
</div>