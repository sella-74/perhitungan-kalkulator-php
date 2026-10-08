<?php
if (isset($_GET["pesan"])) {
    $pesan = "<p> {$_GET["pesan"]} <p>";
} 
else {
    $pesan = "";
}

$nama = $_GET["nama"] ?? "";
$email = $_GET["email"] ?? "";
$hargaMobil = $_GET["harga_mobil"] ?? "";
$dp = $_GET["dp"]?? "";
$tenor = $_GET["tenor"] ?? "";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROLLS-ROYCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    
<header class="border-bottom bg-white sticky-top">
    <div class="container d-flex align-items-conter py-3" style="max-width: 900px;">
        <img src="https://i.pinimg.com/736x/94/b7/eb/94b7eb51c76bcfb93e138e4cc454a4de.jpg" alt="Logo Perusahaan" class="me-3" style="height:55px; width:auto; object-fit:contain;">
        <h4 class="mb-0 fw-bold" style="letter-spacing: 1.5px;">ROLLS ROYCE</h4>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto text-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
            </div> 
        </div>
     </nav> 
</header>

<main id="#beranda">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://images.pexels.com/photos/29852624/pexels-photo-29852624.jpeg" class="d-block w-100" alt="mobil 1">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://images.pexels.com/photos/35164898/pexels-photo-35164898.jpeg" class="d-block w-100" alt="mobil 2">
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/15824820/pexels-photo-15824820.jpeg" class="d-block w-100" alt="'mobil 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

     <section id="tentang" class="container my-4">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="border rounded p-4 h-100">
                    <h5>Sejarah Singkat Rolls-Royce</h5>
                    <p> 
                        Rolls-Royce didirikan oleh Charles Rolls dan Henry Royce di Inggris pada tahun 1906. Perusahaan ini mulai dikenal karena menghasilkan mobil yang berkualitas tinggi, nyaman, dan mewah. Salah satu mobil terkenalnya adalah Rolls-Royce Silver Ghost. Seiring waktu, Rolls-Royce berkembang menjadi salah satu merek mobil mewah paling terkenal di dunia. Saat ini, Rolls-Royce dikenal dengan desain elegan, teknologi canggih, dan proses pembuatan yang sangat memperhatikan detail.
                    </p> 
                </div> 
            </div> 
            <div class="col-md-6">
                <div class="border rounded p-2 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://images.pexels.com/photos/19739239/pexels-photo-19739239.jpeg" alt="Gambar Mobil" class="img-fluid rounded" style="max-height: 400px;">
                </div>
             </div>
        </div>
    </section>

    <main class="container">
    <section class="border rounded p-4">
        <h5>Kalkulator Kredit Mobil</h5>
        <br>
        <?php if (!empty($pesan)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($pesan); ?>
        </div>
    <?php endif; ?>
        <form method="POST" action="proses.php">
            
            <label for="">Nama</label>
            <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control">

            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $email ?>" class="form-control">
            <br>
            <div class="mb-3">
                <label>Harga Mobil</label>
                <input type="number" name="harga_mobil" class="form-control" placeholder="Contoh: 100000000" value="<?php echo $hargaMobil ?>">
            </div>

            <div class="mb-3">
                <label>Pilih DP</label>
                <select name="dp" class="form-select">
                    <option value="">--Pilih DP--</option>
                    <option value="10" <?php if ($dp == "10") echo "selected"; ?>>10%</option>
                    <option value="20" <?php if ($dp == "20") echo "selected"; ?>>20%</option>
                    <option value="30" <?php if ($dp == "30") echo "selected"; ?>>30%</option>
                    <option value="40" <?php if ($dp == "40") echo "selected"; ?>>40%</option>
                    <option value="50" <?php if ($dp == "50") echo "selected"; ?>>50%</option>
                    <option value="60" <?php if ($dp == "60") echo "selected"; ?>>60%</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Pilih Tenor (Tahun):</label><br>
                <input type="radio" name="tenor" value="1" <?php if ($tenor == "1") echo "checked"; ?>> 1 Tahun
                <input type="radio" name="tenor" value="2" <?php if ($tenor == "1") echo "checked"; ?>> 2 Tahun
                <input type="radio" name="tenor" value="3" <?php if ($tenor == "1") echo "checked"; ?>> 3 Tahun
                <input type="radio" name="tenor" value="4" <?php if ($tenor == "1") echo "checked"; ?>> 4 Tahun
                <input type="radio" name="tenor" value="5" <?php if ($tenor == "1") echo "checked"; ?>> 5 Tahun
            </div>

            <input type="submit" name="submit" value="Proses Data">
        </form>

        <br>

    </section>

<footer id="kontak" class="footer-luxury text-black text-center py-4 mt-5">
    <div class="container">
        <p class="mb-1">Rolls-Royce &copy; <?= date('Y') ?></p>
        <p class="mb-0">North America | Telp: + 81 (0) 120 980242 |enquiries.jp@rolls-roycemotorcars.com</p>
    </div>
</footer>

</body>
</html>

