<?php
$kode = $_GET['kode'];

# Check for Violations
$idFile = file_get_contents('AllowedIDs.txt');
$idList = str_word_count($idFile, 1);
$found = false;

foreach($idList as $IDs){
  //echo "<h1>Scan: ".$IDs."</h1>";
  if (strpos($kode,$IDs) !== false) {
        $found = true;
        break;
    }
}

if ($found){
    //echo "<h1>Nemu: ".$IDs."</h1>";
    header("Location: hello.php?kode=".$kode);
} else {
    //echo "<h1>Gak nemu.</h1>";
    header("Location: error.php");
}

# Check if Already Voted?
$voteFile = file_get_contents('VotedIDs.dat');
$voteList = str_word_count($voteFile, 1);
$voted = false;

foreach($voteList as $voters){
  if (strpos($kode,$voters) !== false) {
        $voted = true;
        break;
    }
}

if ($voted){
    header("Location: error.php");
} else {
    // nothing
}

?>
<html lang="en"><head>
  <link rel="icon" href="assets/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&amp;family=Rowdies:wght@300;400;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/responsive.css">


  <title>SELAMAT DATANG!</title>
</head>

<body>

<section class="about" id="about">
    <div class="container">
      <h1>.</h1>
      <h2>Selamat datang!</h2>
      <p>Anda akan melaksanakan sebuah voting atau pemungutan suara berbasis Web. Nam... eh. Mohon maaf, anda salah jalur. Seharusnya gak lewat sini.</p>

      <p>Jangan kunjungi web ini dengan mengetik Alamat IP-nya satu per satu dan klik/copy link yang telah diberikan oleh panitia. Karena itu digunakan sebagai identifikasi hardware anda. Terima kasih!.</p>  
    </div>
    <img class="pattern-about-top" src="assets/pattern-about-top.svg" alt="">
  </section>
  <script src="script.js"></script>
</body></html>