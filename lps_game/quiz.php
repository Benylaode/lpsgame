<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuis LPS Edu Game</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('image/bg.jpg'); /* Ganti dengan warna solid */
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        body::before, body::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 206, 201, 0.3), transparent 70%);
            z-index: 0;
            animation: float 10s infinite ease-in-out;
        }

        body::after {
            bottom: -150px;
            right: -150px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(108, 92, 231, 0.3), transparent 70%);
            animation: float2 12s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(25px); }
            100% { transform: translateY(0); }
        }

        @keyframes float2 {
            0% { transform: translateX(0); }
            50% { transform: translateX(25px); }
            100% { transform: translateX(0); }
        }

        .container-quiz {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: lightblue;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            text-shadow: 0 4px 8px rgba(0,0,0,0.5);
        }

        .quiz-card {
            background-color: blue;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .quiz-card h3 {
            color: #fbbf24;
            margin-bottom: 15px;
        }

        .quiz-card label {
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 1rem;
        }

        input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.2);
            accent-color: #00cec9;
        }

        .submit-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn-hero {
            background-color: #00cec9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-hero:hover {
            background-color: #00b3b0;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 10px 0;
        }

        .nav-container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }

        .nav-links li a.active {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container nav-container">
        <div class="logo">LPS Edu Game</div>
        <ul class="nav-links">
            <li><a href="game.php">Game</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="quiz.php" class="active">Kuis</a></li>
            <li><a href="tentang.php">Profil</a></li>
        </ul>
    </div>
</nav>

<!-- Konten Kuis -->
<div class="container-quiz">
    <h1 style="text-align:center; margin-bottom: 30px;">Kuis Literasi Keuangan LPS</h1>

    <form action="result.php" method="post" class="quiz-form">
        <!-- Pertanyaan akan dimuat di sini oleh JavaScript -->
    </form>
</div>

<script>
    const questions = [
        {
            q: "Apa itu Lembaga Penjamin Simpanan (LPS)?",
            opts: [
                "Lembaga yang memberi pinjaman kepada bank",
                "Lembaga yang menjamin simpanan nasabah di bank",
                "Lembaga yang mencetak uang"
            ],
            name: "q1"
        },
        {
            q: "Maksimal jumlah simpanan yang dijamin LPS adalah?",
            opts: [
                "Rp500 juta per nasabah per bank",
                "Rp1 miliar per rekening",
                "Tidak terbatas"
            ],
            name: "q2"
        },
        {
            q: "Dana LPS berasal dari?",
            opts: [
                "Dana APBN",
                "Premi dari bank peserta",
                "Pajak masyarakat"
            ],
            name: "q3"
        },
        {
            q: "Apa fungsi utama dari LPS?",
            opts: [
                "Mengatur kebijakan moneter",
                "Menjamin simpanan nasabah bank",
                "Mengawasi pasar modal"
            ],
            name: "q4"
        },
        {
            q: "Produk simpanan mana yang dijamin oleh LPS?",
            opts: [
                "Saham",
                "Deposito",
                "Reksadana"
            ],
            name: "q5"
        },
        {
            q: "Apakah LPS menjamin simpanan di semua jenis bank?",
            opts: [
                "Ya, termasuk bank asing",
                "Hanya bank yang terdaftar dan diawasi oleh OJK",
                "Tidak, hanya bank milik pemerintah"
            ],
            name: "q6"
        },
        {
            q: "Apa yang terjadi jika bank gagal memenuhi kewajiban ke nasabah?",
            opts: [
                "Nasabah kehilangan seluruh simpanannya",
                "LPS akan menjamin simpanan nasabah sesuai ketentuan",
                "Ya, dengan mengatur suku bunga"
            ],
            name: "q7"
        },
        {
            q: "Apakah LPS berperan dalam menjaga stabilitas keuangan nasional?",
            opts: [
                "Tidak, itu tugas Bank Indonesia",
                "Ya, melalui penjaminan simpanan dan resolusi bank",
                "Nasabah harus menunggu hingga bank pulih"
            ],
            name: "q8"
        },
        {
            q: "Mengapa LPS penting bagi perbankan di Indonesia?",
            opts: [
                "Menjaga stabilitas finansial",
                "Mengatur suku bunga",
                "Mengontrol inflasi"
            ],
            name: "q9"
        },
        {
            q: "Apa saja syarat agar simpanan dijamin oleh LPS?",
            opts: [
                "Tercatat dalam pembukuan & tidak melebihi tingkat bunga penjaminan",
                "Harus dalam bentuk saham",
                "Harus disimpan di luar negeri"
            ],
            name: "q10"
        }
    ];

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    document.addEventListener("DOMContentLoaded", () => {
        const quizForm = document.querySelector(".quiz-form");

        // Acak pertanyaan
        const randomizedQuestions = shuffle([...questions]);

        // Render pertanyaan
        randomizedQuestions.forEach((q, i) => {
            const card = document.createElement("div");
            card.className = "quiz-card";
            card.innerHTML = `<h3>${i + 1}. ${q.q}</h3>` +
                q.opts.map((opt, idx) => {
                    const letter = String.fromCharCode(97 + idx);
                    return `<label><input type="radio" name="${q.name}" value="${letter}"> ${opt}</label>`;
                }).join("");
            quizForm.appendChild(card);
        });

        // Tambahkan tombol submit
        const submitContainer = document.createElement("div");
        submitContainer.className = "submit-container";
        submitContainer.innerHTML = `<button type="submit" class="btn-hero">Lihat Hasil</button>`;
        quizForm.appendChild(submitContainer);
    });
</script>

</body>
</html>
