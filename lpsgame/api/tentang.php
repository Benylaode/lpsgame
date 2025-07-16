<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang FINPLAYZ</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            background-image: none !important;
        }

        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-weight: bold;
            font-size: 20px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
        }

        .nav-links li a.active {
            font-weight: bold;
            text-decoration: underline;
        }

        .about-section {
            max-width: 1000px;
            margin: 50px auto;
            padding: 0 20px;
            background: #f5f7fa !important;
            background-image: none !important;
            position: relative;
            overflow: hidden;
        }

        .about-section::before,
        .about-section::after {
            content: none !important;
            display: none !important;
        }

        .about-section h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .about-section p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .highlight-box {
            background-color: #ffffff;
            border-left: 5px solid #3498db;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border-radius: 10px;
        }

        .image-section, .video-section {
            margin: 40px 0;
            text-align: center;
        }

        .image-section img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .video-section iframe {
            width: 100%;
            max-width: 720px;
            height: 400px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">FINPLAYZ Edu Game</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="zona.php">Zona Edukatif</a></li>
        <li><a href="game.php">Game Edukatif</a></li>
        <li><a href="quiz.php">Kuis</a></li>
        <li><a href="tentang.php" class="active">Profil</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="user.php">User</a></li>
    </ul>
</nav>

<!-- Konten Tentang -->
<div class="about-section">
    <div class="highlight-box">
        <h2>🎯 Visi & Misi</h2>
        <p><strong>Visi:</strong> Meningkatkan literasi keuangan generasi muda Indonesia agar lebih bijak dalam mengelola keuangan sejak dini.</p>
        <p><strong>Misi:</strong> Menyediakan media edukatif berbasis game yang interaktif, menyenangkan, dan mudah dipahami oleh anak muda.</p>
    </div>

    <div class="highlight-box">
        <h2>👥 Target Pengguna</h2>
        <p>Platform ini dirancang khusus untuk Generasi Z (remaja usia 15–25 tahun) yang gemar menggunakan teknologi, interaktif, dan lebih suka belajar lewat cara yang engaging daripada konvensional.</p>
    </div>

    <div class="highlight-box">
        <h2>🕹️ Keunggulan Gamifikasi</h2>
        <p>Metode gamifikasi membuat proses belajar terasa seperti bermain. Dengan kuis interaktif, reward poin, dan tampilan yang menarik, pengguna lebih semangat untuk belajar tanpa merasa bosan. Ini terbukti meningkatkan retensi informasi dan keterlibatan pengguna secara signifikan.</p>
    </div>

    <!-- Video Edukatif -->
    <div class="video-section">
        <h2>📽️ Video Singkat: Belajar Ngatur Uang Ala Gen Z</h2>
        <iframe src="https://www.youtube.com/embed/74R3eL20eC4" allowfullscreen></iframe>
        <p style="font-size: 14px; color: #888;">*Video contoh edukasi finansial dari YouTube</p>
    </div>
</div>

</body>
</html>
