<?php 
// 1. Simulan ang session
session_start();
include 'config.php';

// 2. Check kung naka-login ang user
if (!isset($_SESSION['user'])) { 
    header("Location: login.php"); 
    exit(); 
}

// 3. Bilangin ang mga Stats para sa cards sa baba
$total_res = mysqli_query($conn, "SELECT COUNT(*) as total FROM equipment");
$total_data = mysqli_fetch_assoc($total_res);

$avail_res = mysqli_query($conn, "SELECT COUNT(*) as total FROM equipment WHERE available > 0");
$avail_data = mysqli_fetch_assoc($avail_res);

$borrow_res = mysqli_query($conn, "SELECT COUNT(*) as total FROM equipment WHERE available < quantity");
$borrow_data = mysqli_fetch_assoc($borrow_res);

// 4. I-include ang header
include 'includes/header.php'; 
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Equipment Management</h2>
            <p class="text-muted">Manage your borrowing equipment inventory</p>
        </div>
        <a href="create.php" class="btn btn-primary fw-bold px-4 shadow-sm">+ Add Equipment</a>
    </div>

    <div class="card p-4 mb-4 border-0 shadow-sm" style="border-radius: 15px;">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th>Borrower</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM equipment ORDER BY id DESC");
                    
                    if(mysqli_num_rows($res) > 0):
                        while($row = mysqli_fetch_assoc($res)):
                            // Determine status based on available count
                            if($row['available'] == $row['quantity']) {
                                $status = 'available';
                                $cls = "bg-success";
                            } elseif($row['available'] == 0) {
                                $status = 'borrowed';
                                $cls = "bg-warning text-dark";
                            } else {
                                $status = 'partial';
                                $cls = "bg-info text-dark";
                            }
                    ?>
                    <tr>
                        <td>#<?= $row['id'] ?></td>
                        <td class="fw-bold text-primary"><?= $row['name'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td><span class="badge rounded-pill <?= $cls ?>"><?= ucfirst($status) ?></span></td>
                        <td><span class="text-muted small">None</span></td>
                        <td class="text-center">
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary mx-1">✎ Edit</a> 
                            <a href="delete.php?id=<?= $row['id'] ?>" 
                               class="btn btn-sm btn-outline-danger mx-1" 
                               onclick="return confirm('Sigurado ka bang gusto mong burahin ito?')">
                                🗑 Delete
                            </a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else:
                    ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Walang record na nahanap.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm text-center" style="border-radius: 15px;">
                <span class="text-muted fw-semibold">Total Equipment</span>
                <div class="h2 fw-bold text-dark mt-2"><?= $total_data['total'] ?></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm text-center" style="border-radius: 15px;">
                <span class="text-muted fw-semibold">Available</span>
                <div class="h2 fw-bold text-success mt-2"><?= $avail_data['total'] ?></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm text-center" style="border-radius: 15px;">
                <span class="text-muted fw-semibold">Borrowed</span>
                <div class="h2 fw-bold text-warning mt-2"><?= $borrow_data['total'] ?></div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>