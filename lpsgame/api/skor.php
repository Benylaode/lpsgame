<?php
// skor.php

// Ambil skor dari query parameter atau POST (sesuaikan dengan pengiriman data kuis)
$score = isset($_GET['score']) ? intval($_GET['score']) : 0;

// Tentukan feedback berdasarkan skor
function getFeedback($score) {
    if ($score >= 80) {
        return "Hebat! Kamu sangat paham materi ini.";
    } elseif ($score >= 50) {
        return "Bagus! Tapi coba pelajari lagi agar lebih menguasai.";
    } else {
        return "Jangan menyerah! Ayo coba lagi dan pelajari materi dengan lebih baik.";
    }
}

$feedback = getFeedback($score);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Skor & Feedback - FINPLAYZ Edu Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container nav-container">
            <div class="logo">FINPLAYZ Edu Game</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="game.php">Game Edukatif</a></li>
                <li><a href="quiz.php" class="active">Kuis</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="user.php">User</a></li>
            </ul>
        </div>
    </nav>

    <main class="container" style="padding: 2rem;">
        <h1>Hasil Kuis</h1>
        <p>Skor kamu: <strong><?php echo $score; ?> / 100</strong></p>
        <p><em><?php echo $feedback; ?></em></p>

        <a href="quiz.php" class="btn-materi">Coba Lagi</a>
        <a href="index.php" class="btn-materi" style="margin-left: 1rem;">Kembali ke Home</a>
    </main>
</body>
</html>
