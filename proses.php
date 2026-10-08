<?php

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit;
}

$nama = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$hargaMobil = trim($_POST["harga_mobil"] ?? "");
$dpPersen = trim($_POST["dp"] ?? "");
$tenorTahun = trim($_POST["tenor"] ?? "");
$query_nama = "nama=".urlencode($nama);
$query_email = "email=".urlencode($email);
$query_harga = "harga_mobil=" . urlencode($hargaMobil);
$query_dp = "dp=" . urlencode($dpPersen);
$query_tenor = "tenor=" . urlencode($tenorTahun);

$isi_form = "&$query_nama&$query_email&$query_harga&$query_dp&$query_tenor";

if  (empty($nama)) {
        $pesan = urlencode("Nama hars diisi");
        header("Location: index.php?pesan=" .$pesan . $isi_form);die();
    }

if (empty($email)) {
        $pesan = urlencode("Email harus diisi");
        header("Location: index.php?pesan=" .$pesan .$isi_form); die();
    }

if(
    empty($hargaMobil) ||
    empty($dpPersen) ||
    empty($tenorTahun)
) {
    header("Location: index.php?pesan=Maaf, form tidak boleh ada yang kosong. Silakan lengkapi data Anda!");
    exit;
}

$hargaMobil = (float) $hargaMobil;
$dpPersen = (float) $dpPersen;
$tenorTahun = (int) $tenorTahun;

$bungaPersen = 20;

if ($hargaMobil <= 0) {
    die("Error: Harga mobil harus lebih besar dari 0!");
}

if ($dpPersen < 0 || $dpPersen > 100) {
    die("Error: Persentase DP harus di antara 0% sampai 100%!");
}

if ($tenorTahun <= 0) {
    die("Error: Tenor tahun harus lebih dari 0!");
}

$dpNominal = $hargaMobil * ($dpPersen / 100);

$pokokHutang = $hargaMobil - $dpNominal;

$bungaNominal = $pokokHutang * ($bungaPersen / 100) * $tenorTahun;

$totalAngsuran = $pokokHutang + $bungaNominal;

$tenorBulan = $tenorTahun * 12;

$angsuranPerbulan = $totalAngsuran / $tenorBulan;

?>
 
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Proses - Rolls Royce</title>

</head>

<body>

<div class="container mt-5">

    <div class="border rounded p-4">

        <h1 class="mb-4">Halaman Proses</h1>

        <?php
        echo "Nama: $nama <br>";
        echo "Email: $email <br>";
        echo "Harga Mobil: Rp " . number_format($hargaMobil, 0, ',', '.') . "<br>";
        echo "DP (" . $dpPersen . "%): Rp " . number_format($dpNominal, 0, ',', '.') . "<br>";
        echo "Pokok Hutang: Rp " . number_format($pokokHutang, 0, ',', '.') . "<br>";
        echo "Bunga (20%): Rp " . number_format($bungaNominal, 0, ',', '.') . "<br>";
        echo "Tenor: " . $tenorTahun . " Tahun (" . $tenorBulan . " Bulan)<br>";
        echo "Total Angsuran: Rp " . number_format($totalAngsuran, 0, ',', '.') . "<br>";
        echo "Angsuran Per Bulan: Rp " . number_format($angsuranPerbulan, 0, ',', '.') . "<br>";
         ?>
    </div>
</div>

</body>
</html>
