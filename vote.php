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

<html lang="en"><head><meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <link rel="icon" href="assets/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&amp;family=Rowdies:wght@300;400;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/responsive.css">
  <title>WEB E-VOTING 2022</title>
</head>

<body>

  <section class="competition" id="competition">

    <div class="container">
      <h1 class="competition-header">PEMILIHAN</h1>

      <div class="competition-content">
        <div class="card">
          <div class="card-1">
            <div class="image-1 card-image"></div>
            <h2 class="heading-1">Muhammad Chandra</h2>
            <?php
        echo "<a class=\"detail\" href=\"proses.php?kode=".$kode."&pilihan=Muhammad Chandra\">PILIH</a>"
        ?>
           
          </div>

          <div class="card-2">
            <div class="image-2 card-image"></div>
            <h2 class="heading-2">Joni Sugioto</h2>
            <?php
        echo "<a class=\"detail\" href=\"proses.php?kode=".$kode."&pilihan=Joni Sugioto\">PILIH</a>"
        ?>
          </div>

          <div class="card-3">
            <div class="image-3 card-image"></div>
            <h2 class="heading-3">Pamungkas Sayoga</h2>
            <?php
        echo "<a class=\"detail\" href=\"proses.php?kode=".$kode."&pilihan=Pamungkas Sayoga\">PILIH</a>"
        ?>
          </div>
        </div>
      </div>
    </div>

    <img class="pattern-competition-left" src="assets/pattern-competition-left.svg" alt="">
    <img class="pattern-competition-right" src="assets/pattern-competition-right.svg" alt="">
  </section>
  <script src="script.js"></script>

</body></html>