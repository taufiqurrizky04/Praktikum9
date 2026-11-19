<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = htmlspecialchars($_POST["nama"], ENT_QUOTES, "UTF-8");
    $tanggalLahir = $_POST["tanggal_lahir"];

    $bulanIndonesia = [
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    ];

    $tanggal = date("j", strtotime($tanggalLahir));
    $bulan = date("n", strtotime($tanggalLahir));
    $tahun = date("Y", strtotime($tanggalLahir));

    $tanggalFormat = $tanggal . " " .
                     $bulanIndonesia[$bulan] . " " .
                     $tahun;

    if (isset($_POST["hobi"])) {

        $hobi = implode(", ", $_POST["hobi"]);

    } else {

        $hobi = "Tidak ada hobi yang dipilih";
    }

    $hobi = htmlspecialchars($hobi, ENT_QUOTES, "UTF-8");

} else {

    header("Location: form_data_diri.html");
    exit;

}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Diri</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 450px;
            max-width: 100%;
            margin: 20px auto;
            padding: 25px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h1 {
            font-size: 26px;
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .data {
            display: grid;
            grid-template-columns: 130px 1fr;
            margin: 25px 0;
            line-height: 1.5;
        }

        .data strong {
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #087cf0;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="container">

        <h1>Tampilan Data Anda</h1>

        <div class="data">
            <strong>Nama Lengkap:</strong>
            <span><?php echo $nama; ?></span>
        </div>

        <div class="data">
            <strong>Tanggal Lahir:</strong>
            <span><?php echo $tanggalFormat; ?></span>
        </div>

        <div class="data">
            <strong>Hobi:</strong>
            <span><?php echo $hobi; ?></span>
        </div>

        <a href="form_data_diri.html">
            « Kembali ke Form
        </a>

    </div>

</body>
</html>
