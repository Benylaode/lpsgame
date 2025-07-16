<!DOCTYPE html>
<html>
<head>
    <title>FINPLAYZ Edu Game</title>
    <link rel="stylesheet" href="style.css">
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Hilangkan gradasi bulat kiri atas -->
    <style>
        .hero {
            background-image: url('image/bg.jpg'); /* Ganti dengan warna solid */
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            color: white;
            padding: 80px 20px;
            text-align: center;
        }
        
.hero {
    /*background: none !important;           /* Hapus background gradien apapun */
    /*background-color: #1e3a8a !important;  /* Ganti dengan warna solid */
    position: relative;
    overflow: hidden;
}

.hero::before,
.hero::after {
    content: none !important;              /* Nonaktifkan pseudo-element pembuat efek */
    display: none !important;
}


    </style>
</head>
<body>


<!-- Navbar -->
<nav class="navbar">
    <div class="container nav-container">
        <div class="logo">FINPLAYZ Ai Edu Game</div>
      <ul class="nav-links">
    <li><a href="index.php" class="active">Home</a></li>
    <li><a href="game.php">Game Edukatif</a></li>
    <li><a href="quiz.php">Kuis</a></li>
    <li><a href="tentang.php">Profil</a></li>
    <li><a href="admin.php">Admin</a></li>
    <li><a href="user.php">User</a></li>
</ul>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <div class="hero-content">
        <h1>Tingkatkan Literasi Keuanganmu Bersama FINPLAYZ Ai Edugame </h1>
        <h2>Main Asik, Finansial Cerdas!</h2>
        <p>Pelajari dan uji pengetahuanmu tentang peran Lembaga Penjamin Simpanan</p>
        <a href="quiz.php" class="btn-hero">Mulai Kuis</a>
    </div>
</div>

<!-- Statistik Literasi Keuangan Gen Z -->
<section class="statistik-literasi">
    <div class="container">
        <h2>📊 Statistik Literasi Keuangan Gen Z Indonesia</h2>
        <p>Rendahnya tingkat literasi keuangan menunjukkan urgensi edukasi yang lebih intensif dan menarik.</p>
        <div class="statistik-chart-container" style="max-width: 600px; margin: 0 auto;">
            <canvas id="literasiChart" width="400" height="300"></canvas>
        </div>
    </div>
</section>



<!-- Infografis Literasi Keuangan Gen Z -->
<section class="infografis">
    <div class="container">
        <h2>Statistik Literasi Keuangan Gen Z</h2>
        <p>Berikut adalah hasil survei terbaru mengenai tingkat literasi keuangan di kalangan Gen Z Indonesia.</p>
        <img src="genz-literasi.png.png" alt="Infografis Literasi Keuangan Gen Z" class="infografis-img">
    </div>
</section>

<!-- Fitur Section -->
<section class="features">
    <div class="feature-card">
        <img src="https://img.icons8.com/ios/50/open-book--v1.png" alt="Materi Edukasi"/>
        <h3>Materi Edukasi Keuangan</h3>
        <p>Pelajari topik-topik penting seperti tabungan, investasi, pinjaman, dan pengelolaan anggaran.</p>
        <a href="materi.php" class="btn-materi">Baca Materi</a>
    </div>
    <div class="feature-card">
        <img src="https://img.icons8.com/ios/50/quiz.png" alt="Kuis Interaktif"/>
        <h3>Kuis Interaktif</h3>
        <p>Uji pemahamanmu melalui kuis singkat dengan cara yang seru dan menantang.</p>
        <a href="quiz.php" class="btn-materi">Mulai Kuis</a>
    </div>
    <div class="feature-card">
        <img src="https://img.icons8.com/ios/50/trophy.png" alt="Skor & Feedback"/>
        <h3>Skor & Feedback</h3>
        <p>Dapatkan skor langsung setelah kuis dan lihat feedback untuk meningkatkan pemahamanmu.</p>
        <a href="skor.php" class="btn-materi">Lihat Skor</a>
    </div>
</section>

<!-- Chart JS Script -->
<script>
    const ctx = document.getElementById('literasiChart').getContext('2d');
    const literasiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tabungan', 'Investasi', 'Asuransi', 'Pinjaman', 'Manajemen Uang'],
            datasets: [{
                label: 'Persentase Literasi (%)',
                data: [55, 42, 33, 25, 60],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>

</body>
</html>
