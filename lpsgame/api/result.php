<?php
$score = 0;

$answers = [
    'q1' => 'b',
    'q2' => 'a',
    'q3' => 'b',
    'q4' => 'b',
    'q5' => 'b',
    'q6' => 'b',
    'q7' => 'b',
    'q8' => 'b',
    'q9' => 'a',
    'q10' => 'a',
];

$feedback = [];

foreach ($answers as $key => $correctAnswer) {
    $userAnswer = $_POST[$key] ?? null;
    if ($userAnswer === $correctAnswer) {
        $score++;
        $feedback[$key] = [
            'status' => 'Benar',
            'correct' => $correctAnswer,
            'your_answer' => $userAnswer
        ];
    } else {
        $feedback[$key] = [
            'status' => 'Salah',
            'correct' => $correctAnswer,
            'your_answer' => $userAnswer ?? 'Tidak menjawab'
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hasil Kuis - LPS Edu Game</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3a8a, #6c5ce7);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(0,0,0,0.3);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #fff;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .nav-links a:hover,
        .nav-links .active {
            background-color: #00cec9;
            color: #000;
        }

        .container-result {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            text-align: center;
        }

        .score-circle {
            font-size: 2.5em;
            background: #00cec9;
            width: 120px;
            height: 120px;
            line-height: 120px;
            margin: 20px auto;
            border-radius: 50%;
            color: #000;
            font-weight: bold;
        }

        .result-msg {
            font-size: 1.2em;
            margin: 20px 0;
        }

        .success { color: #00ff95; }
        .warning { color: #ffe066; }
        .error { color: #ff6b6b; }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .btn-hero,
        .btn-secondary {
            padding: 12px 24px;
            border-radius: 30px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .btn-hero {
            background-color: #00cec9;
            color: #000;
        }

        .btn-hero:hover {
            background-color: #00b2af;
        }

        .btn-secondary {
            background-color: #fbbf24;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #f59e0b;
        }

        .feedback {
            text-align: left;
            margin-top: 30px;
        }

        .feedback p {
            margin-bottom: 10px;
        }

        .correct { color: #00ff95; }
        .incorrect { color: #ff6b6b; }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">LPS Edu Game</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="quiz.php">Kuis</a></li>
        <li><a href="result.php" class="active">Hasil</a></li>
    </ul>
</nav>

<div class="container-result">
    <div class="result-box">
        <h1>Hasil Kuis Kamu</h1>
        <p>Skor kamu adalah:</p>
        <div class="score-circle"><?= htmlspecialchars($score); ?> / 10</div>

        <?php if ($score === 10): ?>
            <p class="result-msg success">Luar biasa! Kamu sangat paham tentang LPS!</p>
        <?php elseif ($score >= 7): ?>
            <p class="result-msg warning">Bagus! Tapi masih ada yang bisa kamu pelajari.</p>
        <?php else: ?>
            <p class="result-msg error">Yuk belajar lagi tentang LPS supaya makin paham!</p>
        <?php endif; ?>

        <div class="btn-group">
            <a href="quiz.php" class="btn-hero">Ulangi Kuis</a>
            <a href="index.php" class="btn-secondary">Kembali ke Beranda</a>
        </div>

        <div class="feedback">
            <h2>Ulasan Jawaban Kamu</h2>
            <ol>
                <?php foreach ($feedback as $key => $data): ?>
                    <li>
                        <?php if ($data['status'] === 'Benar'): ?>
                            <span class="correct">✅ Benar</span> — Jawaban kamu: <strong><?= htmlspecialchars($data['your_answer']) ?></strong>
                        <?php else: ?>
                            <span class="incorrect">❌ Salah</span> — Jawaban kamu: <strong><?= htmlspecialchars($data['your_answer']) ?></strong>,
                            Jawaban benar: <strong><?= htmlspecialchars($data['correct']) ?></strong>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>

</body>
</html>
