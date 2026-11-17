<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator 4 Pola Bintang Terpisah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        input[type="number"] {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: #d9534f;
            font-weight: bold;
            margin-top: 15px;
        }
        .pola-box {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        pre.result {
            font-family: monospace;
            font-size: 16px;
            line-height: 1.2;
            background: #272822;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: left;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form 4 Pola Bintang Terpisah</h2>
    <form method="POST" action="">
        <label for="tinggi">Masukkan tinggi/ukuran (1 - 20):</label>
        <input type="number" id="tinggi" name="tinggi" required min="1" max="20">
        <button type="submit" name="submit">Tampilkan Semua Pola</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = filter_input(INPUT_POST, 'tinggi', FILTER_VALIDATE_INT);

        // Validasi input angka 1 sampai 20
        if ($n === false || $n < 1 || $n > 20) {
            echo "<p class='error'>Masukan tidak valid! Harap masukkan bilangan bulat dari 1 sampai 20.</p>";
        } else {
            echo "<h3>Hasil untuk Ukuran: $n</h3>";

            // --- 1. POLA: ATAS KE BAWAH ---
            echo "<div class='pola-box'>";
            echo "<h4>1. Dari Atas ke Bawah</h4>";
            echo "<pre class='result'>";
            for ($i = 1; $i <= $n; $i++) {
                for ($j = 1; $j <= ($n - $i); $j++) { echo "  "; }
                for ($k = 1; $k <= (2 * $i - 1); $k++) { echo "* "; }
                echo "\n";
            }
            echo "</pre>";
            echo "</div>";

            // --- 2. POLA: BAWAH KE ATAS ---
            echo "<div class='pola-box'>";
            echo "<h4>2. Dari Bawah ke Atas</h4>";
            echo "<pre class='result'>";
            for ($i = $n; $i >= 1; $i--) {
                for ($j = 1; $j <= ($n - $i); $j++) { echo "  "; }
                for ($k = 1; $k <= (2 * $i - 1); $k++) { echo "* "; }
                echo "\n";
            }
            echo "</pre>";
            echo "</div>";

            // --- 3. POLA: KIRI KE KANAN ---
            echo "<div class='pola-box'>";
            echo "<h4>3. Dari Kiri ke Kanan</h4>";
            echo "<pre class='result'>";
            for ($i = 1; $i <= $n; $i++) {
                for ($k = 1; $k <= $i; $k++) { echo "* "; }
                echo "\n";
            }
            echo "</pre>";
            echo "</div>";

            // --- 4. POLA: KANAN KE KIRI ---
            echo "<div class='pola-box'>";
            echo "<h4>4. Dari Kanan ke Kiri</h4>";
            echo "<pre class='result'>";
            for ($i = 1; $i <= $n; $i++) {
                for ($j = 1; $j <= ($n - $i); $j++) { echo "  "; }
                for ($k = 1; $k <= $i; $k++) { echo "* "; }
                echo "\n";
            }
            echo "</pre>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>