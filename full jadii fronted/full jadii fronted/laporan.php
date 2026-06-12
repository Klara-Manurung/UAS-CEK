<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Donasi - Donasi Masjid Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { font-family: 'Poppins', sans-serif; }
        .stat-card { border-radius: 20px; transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-mosque text-primary me-2"></i>Donasi Masjid ID
        </a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active fw-semibold" href="laporan.php">Laporan</a>
            <a class="nav-link" href="profile.php">
                <i class="fas fa-user me-1"></i><?= $_SESSION['nama'] ?>
            </a>
            <a class="nav-link btn btn-outline-primary ms-2" href="logout.php">Keluar</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold mb-1">
                <i class="fas fa-chart-bar text-primary me-3"></i>Laporan Donasi
            </h1>
            <p class="text-muted">Statistik donasi masjid di seluruh Indonesia</p>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow h-100 bg-primary text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-mosque fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold"><?= $total_semua_masjid ?></h3>
                    <p class="mb-0">Total Masjid</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow h-100 bg-success text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-money-bill-wave fa-3x mb-3 opacity-75"></i>
                    <h5 class="fw-bold">Rp <?= number_format($total_semua_donasi,0,',','.') ?></h5>
                    <p class="mb-0">Total Donasi</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow h-100 bg-warning text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-hand-holding-heart fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold"><?= $total_transaksi ?></h3>
                    <p class="mb-0">Transaksi</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow h-100 bg-info text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-map-marker-alt fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold"><?= count($laporan_provinsi) ?></h3>
                    <p class="mb-0">Provinsi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="card border-0 shadow mb-5">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="mb-0 fw-semibold">Donasi per Provinsi</h5>
        </div>
        <div class="card-body">
            <canvas id="provinsiChart" height="80"></canvas>
        </div>
    </div>

    <!-- Tabel Provinsi -->
    <div class="card border-0 shadow mb-5">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="mb-0 fw-semibold">Detail per Provinsi</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Provinsi</th>
                            <th>Jumlah Masjid</th>
                            <th>Total Donasi</th>
                            <th>Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($laporan_provinsi as $i => $lp): ?>
                        <tr>
                            <td>
                                <span class="badge <?= $i < 3 ? 'bg-success' : 'bg-secondary' ?>">
                                    #<?= $i+1 ?>
                                </span>
                            </td>
                            <td><strong><?= $lp['nama_provinsi'] ?></strong></td>
                            <td><span class="badge bg-primary"><?= $lp['jumlah_masjid'] ?></span></td>
                            <td><strong>Rp <?= number_format($lp['total_donasi'],0,',','.') ?></strong></td>
                            <td><?= $lp['jumlah_donasi'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Top 10 Masjid -->
    <h5 class="fw-bold mb-4">Top 10 Masjid Paling Banyak Donasi</h5>
    <div class="row g-3">
        <?php foreach($top_masjid as $i => $masjid): ?>
        <div class="col-lg-6">
            <div class="d-flex align-items-center p-3 border rounded-3 shadow-sm bg-white">
                <span class="badge fs-6 fw-bold bg-primary px-3 py-2 rounded-pill me-3">#<?= $i+1 ?></span>
                <div class="flex-grow-1">
                    <h6 class="mb-0 fw-semibold"><?= htmlspecialchars($masjid['nama_masjid']) ?></h6>
                    <small class="text-muted"><?= $masjid['nama_kota'] ?>, <?= $masjid['nama_provinsi'] ?></small>
                </div>
                <div class="fw-bold text-primary">
                    Rp <?= number_format($masjid['total_donasi'],0,',','.') ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ctx = document.getElementById('provinsiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($laporan_provinsi, 'nama_provinsi')) ?>,
            datasets: [{
                label: 'Total Donasi',
                data: <?= json_encode(array_column($laporan_provinsi, 'total_donasi')) ?>,
                backgroundColor: 'rgba(102, 126, 234, 0.8)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 2,
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => 'Rp ' + v.toLocaleString('id-ID')
                    }
                }
            }
        }
    });
</script>
</body>
</html>