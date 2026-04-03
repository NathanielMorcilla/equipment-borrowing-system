<?php 
include 'config.php';
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
include 'includes/header.php'; 
?>

<div class="container my-5 text-center">
    <div class="mb-5">
        <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">Development Team</span>
        <h2 class="fw-bold display-6">Meet the Minds Behind</h2>
        <p class="text-muted">Ang grupo ng mga estudyante na bumuo sa platform na ito.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 p-4 h-100 text-white shadow" style="background: linear-gradient(135deg, #0ea5e9, #2563eb);">
                <div class="mb-3">
                    <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 30px;">👩‍💻</div>
                </div>
                <h4 class="fw-bold">Maria Santos</h4>
                <p class="small opacity-75 fw-semibold">Database Architect / Backend</p>
                <hr class="bg-white">
                <p class="small">In-charge sa pagbuo ng SQL structures at pag-optimize ng database connections sa system.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 p-4 h-100 text-white shadow" style="background: linear-gradient(135deg, #ec4899, #d946ef);">
                <div class="mb-3">
                    <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 30px;">🎨</div>
                </div>
                <h4 class="fw-bold">John Dela Cruz</h4>
                <p class="small opacity-75 fw-semibold">Frontend Developer / UI Designer</p>
                <hr class="bg-white">
                <p class="small">Nakatuon sa paggawa ng modernong user interface gamit ang Bootstrap at Custom CSS styles.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 p-4 h-100 text-white shadow" style="background: linear-gradient(135deg, #10b981, #059669);">
                <div class="mb-3">
                    <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 30px;">💻</div>
                </div>
                <h4 class="fw-bold">Sarah Johnson</h4>
                <p class="small opacity-75 fw-semibold">Lead Programmer / CRUD Logic</p>
                <hr class="bg-white">
                <p class="small">Ang bumuo ng kabuuang logic ng Create, Read, Update, at Delete operations ng project.</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <a href="index.php" class="btn btn-outline-secondary px-4 py-2 rounded-pill">Back to Dashboard</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>