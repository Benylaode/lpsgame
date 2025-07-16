<!DOCTYPE html>
<html>
<head>
    <title>Materi Edukasi Keuangan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .pdf-container {
            width: 100%;
            max-width: 900px;
            margin: 40px auto;
            border: 2px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        iframe.pdf-viewer {
            width: 100%;
            height: 600px;
            border: none;
        }

        .pdf-info {
            text-align: center;
            margin-bottom: 20px;
        }
        
    .btn-back {
        display: inline-block;
        background-color: #4CAF50; /* Hijau lembut */
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s, transform 0.2s;
        margin: 20px auto;
        display: block;
        text-align: center;
        width: fit-content;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .btn-back:hover {
        background-color: #45a049; /* Warna hijau lebih gelap saat hover */
        transform: scale(1.05);
    }

    .back-button {
        text-align: center;
    }


    </style>
</head>
<body>
    <h1 style="text-align:center;">📘 Materi Edukasi Keuangan</h1>
    <p class="pdf-info">Berikut ini adalah materi interaktif dalam bentuk PDF. Gunakan scrollbar atau kontrol di bawah untuk membaca lebih lanjut:</p>

    <div class="pdf-container">
        <iframe class="pdf-viewer" src="files/materi keuangan.pdf"></iframe>
    </div>

    <p style="text-align:center;"><a href="files/materi keuangan.pdf" download>⬇️ Unduh Materi PDF</a></p>
</body>
<div class="back-button">
    <a href="index.php" class="btn-back">🏠 Kembali ke Beranda</a>
</div>

</html>
