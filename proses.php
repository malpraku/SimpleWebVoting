<?php
$kode = $_GET['kode'];
$pilihan = $_GET['pilihan'];
$data = $kode . " | " . $pilihan;

echo "<h1><br>Identification: " .$kode."</h1>";
echo "<h1><br>Selected Option: " . $pilihan."</h1>";

# Check for Duplicates
$votersFile = file_get_contents('VotedIDs.dat');
$votersList = str_word_count($votersFile, 1);
$found = false;

foreach($votersList as $blocked){
	if (strpos($kode,$blocked) !== false) {
        $found = true;
        break;
    }
}

if ($found){
    echo "<h1><br>Already voted.</h1>";
	header("Location: error.php");
} else {
    echo "<h1><br>Vote sent!.</h1>";
    file_put_contents("VotedIDs.dat", $kode . "\n", FILE_APPEND);
    file_put_contents("VotingResults.dat", $data . "\n", FILE_APPEND);
    header("Location: sukses.php");
}


exit();


?>

