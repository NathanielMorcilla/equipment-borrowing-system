<?php 
include 'config.php';
// Guard: Bawal pumasok kung hindi naka-login
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
include 'includes/header.php'; 
?>

<div class="container my-5">
    <div class="card p-5 shadow-sm border-0 bg-white">
        <div class="text-center mb-5">
            <div class="d-inline-block p-3 bg-light rounded-circle mb-3">
                <span style="font-size: 2rem;">🛡️</span>
            </div>
            <h1 class="fw-bold text-dark">About The Project</h1>
            <p class="text-muted mx-auto mt-3" style="max-width: 700px; font-size: 1.1rem;">
                Ang **CCS Equipment Management System** ay idinisenyo upang mapadali ang pag-monitor ng mga kagamitan sa College of Computer Studies. Layunin nito na magkaroon ng organisadong record para sa bawat hiram at balik ng gamit.
            </p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="p-4 border rounded-4 h-100 bg-light">
                    <h5 class="fw-bold text-primary mb-3">🚀 Core Purpose</h5>
                    <p class="text-muted mb-0">I-automate ang manual na logbook system patungo sa isang mabilis at secure na digital inventory platform.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border rounded-4 h-100 bg-light">
                    <h5 class="fw-bold text-primary mb-3">📊 Real-time Tracking</h5>
                    <p class="text-muted mb-0">Mabilis na makikita kung ang isang equipment ay **Available**, **Borrowed**, o nasa ilalim ng **Maintenance**.</p>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-4 border-top text-center">
            <p class="text-muted small">Version 1.0 | Developed for Educational Purposes</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>