<?php
$kode = $_GET['kode'];

# Check for Violations
$idFile = file_get_contents('AllowedIDs.txt');
$idList = str_word_count($idFile, 1);
$found = false;

foreach($idList as $IDs){
  if (strpos($kode,$IDs) !== false) {
        $found = true;
        break;
    }
}

if ($found){
    // nothing
} else {
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
      <h1><br></h1>
      <h2>Selamat datang!</h2>
      <p><br></p>
      <p>Anda akan melaksanakan sebuah voting atau pemungutan suara berbasis Web. Namun, perlu diketahui. Setelah anda berhasil memilih, maka link yang anda gunakan tidak akan valid lagi atau hangus.</p>

      <p>Maka dari itu, silahkan pilih sebaik-baiknya karena pilihan anda hanya dapat dikirim sekali saja dan tidak dapat diubah kembali. Silahkan lanjut dengan menekan tombol dibawah.</p>

      <p><br></p>

      <div class="btn-wrap">
        <?php
        echo "<a href=\"vote.php?kode=".$kode."\">Mulai Voting<i class=\"fa fa-arrow-circle-right\" aria-hidden=\"true\"></i></a>"
        ?>
      </div>
    </div>
    <img class="pattern-about-top" src="assets/pattern-about-top.svg" alt="">
  </section>
  <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
  </script>
  <script src="script.js"></script>

</body></html>