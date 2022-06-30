<?php
function require_auth() {
  $AUTH_USER = 'admin';
  $AUTH_PASS = 'admin';
  header('Cache-Control: no-cache, must-revalidate, max-age=0');
  $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
  $is_not_authenticated = (
    !$has_supplied_credentials ||
    $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
    $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
  );
  if ($is_not_authenticated) {
    header('HTTP/1.1 401 Authorization Required');
    header('WWW-Authenticate: Basic realm="Access denied"');
    exit;
  }
}

require_auth();
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 2; URL=$url1");
?>

<?php
$kode = $_GET['kode'];

if (strpos($kode, 'mimin') !== false) {
    // do nothing
} else {
  header("Location: error.php");
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
      <h1 class="competition-header">HASIL HITUNG</h1>
      <?php
          $filePath = "VotingResults.dat";
    $voters = count(file($filePath));
          echo "<h2 style=\"text-align: center;font-size: 1.875rem;\">$voters/40 SUARA</h2>"
      ?>
      <div class="competition-content">
        <div class="card">
          <div class="card-1">
            <div class="image-1 card-image"></div>
            <h2 class="heading-1">Muhammad Chandra</h2>
            <?php
$filename = "VotingResults.dat";
$searchFor = "Muhammad Chandra";
$fileContent = file_get_contents($filename);
$count = substr_count($fileContent, $searchFor);
        echo "<a class=\"detail\">$count</a>"
        ?>
           
          </div>

          <div class="card-2">
            <div class="image-2 card-image"></div>
            <h2 class="heading-2">Joni Sugioto</h2>
            <?php
$filename = "VotingResults.dat";
$searchFor = "Joni Sugioto";
$fileContent = file_get_contents($filename);
$count = substr_count($fileContent, $searchFor);
        echo "<a class=\"detail\">$count</a>"
        ?>
          </div>

          <div class="card-3">
            <div class="image-3 card-image"></div>
            <h2 class="heading-3">Pamungkas Sayoga</h2>
            <?php
$filename = "VotingResults.dat";
$searchFor = "Pamungkas Sayoga";
$fileContent = file_get_contents($filename);
$count = substr_count($fileContent, $searchFor);
        echo "<a class=\"detail\">$count</a>"
        ?>
          </div>
        </div>
      </div>
      <p><br><br></p>
      <?php
$fh = fopen("VotingResults.dat", 'r');
$pageText = fread($fh, 25000);
$suaraFull = nl2br($pageText);
        echo "<p style=\"text-align:center;\">$suaraFull</p>"
        ?>
      
    </div>



    <img class="pattern-competition-left" src="assets/pattern-competition-left.svg" alt="">
    <img class="pattern-competition-right" src="assets/pattern-competition-right.svg" alt="">
  </section>
  <script src="script.js"></script>

</body></html>